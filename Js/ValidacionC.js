document.getElementById('botonreserva').addEventListener('click', function(e){
   let tdoc = document.getElementById('cboDocumento').value
   let doc= document.getElementById('doc').value;
   let fchnac = document.getElementById('edades').value;
   let celular = document.getElementById('celular').value;
   let mtp = document.getElementById('cboPago').value;
   let nombre = document.getElementById('name').value;
   let apellido = document.getElementById('ape').value;
   let correo = document.getElementById('correo').value;
   let tpa = document.getElementById('cboAseguradora').value;
   console.log(tdoc);
   if (tdoc == 0) {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Elegir un tipo de documento',
        showConfirmButton: false,
        timer: 1500
      })
   }else{
    if (fchnac == '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Colocar su fecha de nacimiento',
            showConfirmButton: false,
            timer: 1500
          })
     }else{
         if (mtp == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Se esta olvidando de pagar la cita',
                
                showConfirmButton: false,
                timer: 1500
              })
         }else{
            if (tpa == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Elegir una aseguradora',
                    showConfirmButton: false,
                    timer: 1500
                  })
            }else{
                if (doc == '' || celular == '' || nombre == '' || apellido == '' || correo == '' ) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Verifique si todos los campos estan llenados',
                        showConfirmButton: false,
                        timer: 1700
                      })
                }else{
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Cita reservada correctamente',
                        text:   'Los datos de su cita fueron enviados a su correo.',
                        showConfirmButton: true,
                        //timer: 2700,
                        showClass: {
                            popup: 'animate__animated animate__flipInX'
                          },
                          hideClass: {
                            popup: 'animate__animated animate__flipOutX'
                          }
                      }).then((result) =>{
                          if (result.isConfirmed) {
                            location.href="Citas.php";
                          }
                      })
                      
                }
            }

             
         }
     }
    
   }
  
   
  })