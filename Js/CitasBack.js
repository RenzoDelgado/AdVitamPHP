var botonPaso1 = document.getElementById('boton1');
var cboDoctor = document.getElementById('cboDoctor');
var cboEspecialidad = document.getElementById('cboEspecialidad');
var botonante = document.getElementById('botonante');
var formulario = document.getElementById('formularioCita');
var calendarObj = new Calendar();
var botonsgt2 = document.getElementById('boton2');

window.onload = pageLoad();

function pageLoad(){
    let valorEspecialidad = cboEspecialidad.value;
    console.log(valorEspecialidad);
    disableButton();

    if (valorEspecialidad === '0') {
        return
    }

    llenarComboDoctores();
    
}

function disableButton(){
    if(cboEspecialidad.value === '0' || cboDoctor.value === '0'){
        botonPaso1.disabled=true;
        return;
    }
    botonPaso1.disabled=false;
}

function llenarComboDoctores(){
    let valorCombo = cboEspecialidad.value;
    var template = '';
    var formData = new FormData();

    formData.append('valorCombo',valorCombo);

    fetch('php/DoctorxEspecialidad.php',{
        method:'POST',       
        body: formData
    })
        .then( res => res.json())
        .then( data => {
            template = '<option value="0" selected disabled>Selecione un doctor</option>';
            for(let valor of data){
                template += `<option value="${valor['id']}">${valor['nombre'] + " " + valor['apellido']}</option>`;
            }
            cboDoctor.innerHTML=template;
        });
}



cboEspecialidad.addEventListener('change', (event) =>{
    llenarComboDoctores();
    let botonPaso1 = document.getElementById('boton1');
    botonPaso1.disabled=true;

    var combo = document.getElementById("cboEspecialidad");
    var selected = combo.options[combo.selectedIndex].text;
    let especialidad = document.getElementById('EspeSelect');
    let precio = document.getElementById('costocita');
    especialidad.innerHTML=selected;

 

    let valorCombo = cboEspecialidad.value;
    var datos =new FormData();
    let template="";

    datos.append('valorCombo',valorCombo);

    fetch('php/PrecioxEspecialidad.php',{
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
          //for (var v of data){
            console.log(data[0].precio);

             template= `${data[0].precio}`;
          //}
         precio.innerHTML=template; 
        });

      

});

cboDoctor.addEventListener('change', (event)=>{
    disableButton();
});


function getData(){
    let cboDoctor = document.getElementById('cboDoctor');
    let idDoctor = cboDoctor.value;
    let formData = new FormData();

    formData.append('idDoctor',idDoctor);

    fetch('php/HorarioDoctor.php',{
        method: 'POST',
        body: formData
    })
        .then(res => res.json())
        .then(data => {
            llenarArray(data);
        });
}

function llenarArray(data){
    let arrayDatos = [];
    for(let valor of data){
        arrayDatos.push({
                id: valor['id'],
                fecha: valor['fecha'],
                horaInicio: valor['horaInicio'],
                horaFinal: valor['horaFinal']
        });
    }

    calendarObj.runCalendar('calendar',data);
    let botonSiguiente = document.getElementById('boton2');
    botonSiguiente.disabled = true;
}

formulario.addEventListener('submit', function(e){
    e.preventDefault();
    let cboAseguradora = document.getElementById('cboAseguradora')
    let cboDocumento = document.getElementById('cboDocumento')
    let cboPago = document.getElementById('cboPago')
    
    let datos =new FormData(formulario);
    let fecha = traerFecha();
    let hora = traerHora();
    let precio= traerPrecio();
    
    datos.append('fecha',fecha);
    datos.append('hora',hora);
    datos.append('cboAseguradora', cboAseguradora.value);
    datos.append('cboDocumento', cboDocumento.value);
    datos.append('cboPago', cboPago.value);
    datos.append('cboDoctor', cboDoctor.value);
    
    datos.append('NombreDoctor', cboDoctor.options[cboDoctor.selectedIndex].text);
    datos.append('Especialidad', cboEspecialidad.options[cboEspecialidad.selectedIndex].text);
    datos.append('PrecioCita',precio);

    fetch('php/EnviarEmail.php',{
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
        });

    fetch('php/GuardarCita.php',{
        method: 'POST',
        body: datos
    })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            
        });

});

function traerFecha(){
    let fecha = moment(calendarObj.selectedDate).format('YYYY-MM-DD');
    return fecha;
}
function traerHora(){
    let elTime = document.getElementById('containerHoras');
    let hora = elTime.querySelector('.horaSeleccionada');
    return hora.textContent; 
}

function traerPrecio(){
    let preciox= document.getElementById('costocita');
    let valpreciox= preciox.innerHTML;
        console.log(valpreciox);
        return valpreciox;
}

botonPaso1.addEventListener('click', (event)=>{
    getData();
});

botonante.addEventListener('click', (event)=>{
    let calendar = document.getElementById('calendar');
    let containerhoras = document.getElementById('containerHoras');

    calendar.innerHTML='';
    containerhoras.innerHTML = '';

    calendarObj.currentMonth = moment();
});


botonsgt2.addEventListener('click',(e)=>{
    let fechayhora = document.getElementById('fechyhora');
    let fecha = moment(traerFecha()).format('DD/MM/YYYY');
    let hora = traerHora();
    //traerHora();
    let template=` <label>Fecha y hora seleccinada: ${fecha} y ${hora}</label> `;

    //console.log(fecha + " " + hora);
    fechayhora.innerHTML=template;
    
});




