function validar(correo){
    var correo = $("#textcorreo").val();
    var expReg= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esvalido = expReg.test(correo);
    if(esvalido == true){
        Swal.fire(
            'Gracias por suscribirse',
            'Se a suscrito correctamente en Ad Vitam!',
            'success'
        )
    }else{
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Debe colocar un correo electronico valido.',
            text: 'Corroborar la informacion colocada.',
            showConfirmButton: true,
        })
    }
   
}
document.getElementById("buttonbole").addEventListener('click', function(e){
    validar();
  })