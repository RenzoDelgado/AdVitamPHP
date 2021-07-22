class Calendar {
    constructor() {
        this.cont = 0;
        this.data = null;
        this.cells = [];
        this.workDaysOfMonth = [];
        this.selectedDate = null;
        this.currentMonth = moment();
        this.elCalendar = null;
        this.elGridBody = null; //necesario que este despues del template
        this.elMonthName = null;
        this.time = new Time();
    }

    runCalendar(id,data){
        this.data = data;
        this.elCalendar = document.getElementById(id);
        this.showTemplate();
        this.elGridBody = this.elCalendar.querySelector('.grid__body'); //necesario que este despues del template
        this.elMonthName = this.elCalendar.querySelector('.month-name');
        this.showCells();
    }

    showTemplate() {
        this.elCalendar.innerHTML = this.getTemplate();
        this.addEventListenerControls();
    }

    getTemplate() {
        let template = 
        `<div class="calendar__header">
            <button type="button" class="control control--prev fas fa-chevron-circle-left"></button>
            <span class="month-name"></span>
            <button type="button" class="control control--next fas fa-chevron-circle-right"></button>
        </div>

        <div class="calendar_body">
            <div class="grid">
                <div class="grid__header">
                    <span class="grid__cell grid__cell--gh">Lun</span>
                    <span class="grid__cell grid__cell--gh">Mar</span>
                    <span class="grid__cell grid__cell--gh">Mie</span>
                    <span class="grid__cell grid__cell--gh">Jue</span>
                    <span class="grid__cell grid__cell--gh">Vie</span>
                    <span class="grid__cell grid__cell--gh">Sab</span>
                    <span class="grid__cell grid__cell--gh">Dom</span>
                </div>
                <div class="grid__body">
                    
                </div>
            </div>
        </div>`;
        return template;
    }

    addEventListenerControls() {
        let elControls = this.elCalendar.querySelectorAll('.control');
        elControls.forEach(elControls => {
            elControls.addEventListener('click', e => {
                let elTarget = e.target;
                let next = false;

                if (elTarget.classList.contains('control--next')) {
                    next = true;
                }
                
                this.changeMonth(next);
                
                this.showCells();
            })
        });
    }

    changeMonth(next = true) {
        if (next) {
            this.currentMonth.add(1, 'months');
        } else {
            this.currentMonth.subtract(1, 'months');
        }
    }

    showCells() {
        this.generateWorkDay();
        this.cells = this.generateDate(this.currentMonth);
        //console.log(this.workDaysOfMonth);
        //console.log(this.cells);
        if (this.cells === null) {
            console.error('No fue posible generar las fechas del calendario')
            return;
        }

        this.elGridBody.innerHTML = '';
        let templateCells = '';
        let disabledClass = '';
        let workDay = '';

        for (let i = 0; i < this.cells.length; i++) {
            disabledClass = '';

            /*if (!this.cells[i].isInCurrentMonth) {
                disabledClass = 'grid__cell--disabled';
            }*/

            if(!this.cells[i].workDay){
                disabledClass = 'grid__cell--disabled';
            }

            templateCells += `
                <span class="grid__cell grid__cell--gd ${disabledClass} " data-cell-id="${i}">${this.cells[i].date.date()}</span>
            `;
        }
        
        this.elMonthName.innerHTML = this.currentMonth.format('MMM YYYY')
        this.elGridBody.innerHTML = templateCells;
        this.addEventListenerToCells();
    }

    generateDate(monthToShow = moment()) {
        if (!moment.isMoment(monthToShow)) {
            return null;
        }
        
        let dateStart = moment(monthToShow).startOf('month');
        let dateEnd = moment(monthToShow).endOf('month');
        let cells = [];

        while (dateStart.day() !== 1) {
            dateStart.subtract(1, 'days');
        }
        while (dateEnd.day() !== 0) {
            dateEnd.add(1, 'days');
        }
        
        do {
            let boleean = false;
            for(let valor of this.workDaysOfMonth){
                let dayData = new Date(valor['fecha']);
                boleean = moment(dayData).format('YYYY-MM-DD') === moment(dateStart).format('YYYY-MM-DD');
                if(boleean){
                    break;
                }
            }

            cells.push({
                date: moment(dateStart),
                isInCurrentMonth: dateStart.month() === monthToShow.month(),
                workDay: boleean
            });
            
            dateStart.add(1, 'days');
        } while (dateStart.isSameOrBefore(dateEnd));

        return cells;
    }

    generateWorkDay(){
        let nowMonth = moment(this.currentMonth).format('MM');
        let workDaysOfMonth = [];
        console.log(this.data);
        for(let valor of this.data){
            let dayData = new Date(valor['fecha']+"T00:00:00");
            let monthData = dayData.getMonth() + 1;

            if(nowMonth == monthData){
                workDaysOfMonth.push({
                    fecha: dayData
                });
            }
        }
        this.workDaysOfMonth = workDaysOfMonth;
    }

    addEventListenerToCells() {
        let elCells = this.elCalendar.querySelectorAll('.grid__cell--gd');
        elCells.forEach(elCells => {
            elCells.addEventListener('click', e => {
                let elTarget = e.target;

                if (elTarget.classList.contains('grid__cell--disabled') || elTarget.classList.contains('grid__cell--selected')) {
                    return;
                }

                let selectedCell = this.elGridBody.querySelector('.grid__cell--selected');

                if (selectedCell) {
                    selectedCell.classList.remove('grid__cell--selected');
                }

                this.cont = this.cont +1;
                console.log('click: '+ this.cont);
               
                console.log('hiciste click capazo 😎👌');
                //console.log('hiciste click capazo');

                elTarget.classList.add('grid__cell--selected');
                this.selectedDate = this.cells[parseInt(elTarget.dataset.cellId)].date;
                console.log(this.selectedDate);

                this.callTime();
            });
        });
    }

    callTime(){
        this.time.runTime('containerHoras',this.data,this.selectedDate);
    }
    

    getElement() {
        return this.elCalendar;
    }
    
    value() {
        return this.selectedDate;
    }

    /* EN PROCESO...
    -------------------------------------------------------
        Creacion de la funcion generarHoras();
            Esta funcion usara los datos:
                - Id del doctor (dato obtenido del paso 1)
                - 
    -------------------------------------------------------
    */

    /* EN PROCESO...
    -------------------------------------------------------
        Creacion de la funcion agregarHorario(ArrayHorario);
            Esta funcion usara los datos:
                - Array de tipo Horario (obtenido por algun servicio).
            
            Detalles de los datos:
                - El array debe ser traido por medio de AJAX (ya que no se recarga la pagina)
                al momento darle click a "SIGUIENTE" para pasar al paso dos. Pero este procedimiento
                de obtencion del array debe estar en otro js.
            
            Sobre la funcion:
                - Crear un foreach que recorra el array y agrege los horarios de el mes actual.
                Esta idea funciona pero es de muy bajo rendimiento ya que si tengo registros de los 
                horarios del año pasado entonces recorrera todo esos datos. 
                                                                                                
                - La solucion seria obtener los registros de los horarios de la fecha actual hasta  
                luego de 6 meses utilizando el campo "ESTADO" para filtrar los dias que trabaja. 
                Y luego aplicar el proceso de recorrer el array con un foreach. 

                - Para el foreach usare cierta parte de la logica de la funcion "showCells()" para 
                agregar las fechas del "mes actual del calendario", aunque... quiza seria mejor si 
                el "ArrayHorario" contuviera solo los dias del "mes actual del calendario" asi como 
                en la funcion de generateDate
                     
    -------------------------------------------------------
    */

   /* 
   -------------------------------------------------------
    tarea mañana:
        - Remover la clase "grid__cell--workingday" cuando cambie de doctor 
        -los dias que laborables que se tengan el diseño de la calse "grid__cell--gd" y que los
        dias que no se trabaje que se agrege la clase disabled
   -------------------------------------------------------
   */

}

