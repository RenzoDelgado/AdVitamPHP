var formcard = document.querySelector('#formulario-tarjeta');
var logoMarca = document.querySelector('#logo-marca');
var formfech = document.querySelector('#formulario-tarjeta');
var formcvv = document.querySelector('#formulario-tarjeta');
var botonaceptar = document.querySelector('.btn_modal_accept');

function seleccionarpago() {
    $("select#cboPago").change(function () {
        let edad = document.getElementById('inputedad').value;
        // var modalpago = document.querySelector('.modal')
        var pago = $(this).children("option:selected").val();
        if (pago == 1) {
            if (edad <18) {
                Swal.fire({
                    title: 'Eres menor de edad!',
                    text: "Seguro que deseas pagar online?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si estoy seguro',
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                      }
                  }).then((result) => {
                    if (result.isConfirmed) {
                        $('#staticBackdrop').modal('show')
                    }
                  })
            }else{
                $('#staticBackdrop').modal('show')
            }
            
        } else {
               
        }

    });
}


formcard.inputNumero.addEventListener('keyup', (e) => {
    var valorInput = e.target.value;
    formcard.inputNumero.value = valorInput.replace(/\s/g, '').replace(/\D/g, '').replace(/([0-9]{4})/g, '$1 ').trim();

    if (valorInput[0] == 4) {
        logoMarca.innerHTML = '';
        const imagen = document.createElement('img');
        imagen.src = 'Imagenes/Card/visa.png';
        logoMarca.appendChild(imagen);
    } else if (valorInput[0] == 5) {
        logoMarca.innerHTML = '';
        const imagen = document.createElement('img');
        imagen.src = 'Imagenes/Card/mastercard.png';
        logoMarca.appendChild(imagen);
    }
    if (valorInput[18] >= 0 && valorInput[18] <= 9) {
        let cardcvv = document.getElementById("CVV").value;
       // alert("se pusheo ultimo digito de la tarjeta");
        if (cardcvv > 3) {
            botonaceptar.style.display = 'block';
        }
    } else {
        botonaceptar.style.display = 'none';
    }

    if (valorInput[0] == 1 || valorInput[0] == 2 || valorInput[0] == 3 || valorInput[0] == 6 || valorInput[0] == 7 || valorInput[0] == 8 || valorInput[0] == 9 || valorInput[0] == 0) {
        document.getElementById('btn_modal_card').addEventListener(
            'click', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'No se a podido procesar el pago',
                    text: 'Por favor verificar los datos de su tarjeta.',
                    footer: '<a href=""></a>'
                })
            });
    } else {
        document.getElementById('btn_modal_card').addEventListener(
            'click', function () {
                let cardnum = document.getElementById("inputNumero").value;
                let cardfech = document.getElementById("inputFecha").value;
                let cardcvv = document.getElementById("CVV").value;
                if (cardnum == '' || cardfech == '' || cardcvv == '') {

                    Swal.fire({
                        icon: 'error',
                        title: 'Completar los datos de la tarjeta',
                        text: 'Por favor verificar los datos de su tarjeta.',
                        footer: '<a href=""></a>'
                    })
                } else {
                    Swal.fire({
                        position: 'top-center',
                        icon: 'success',
                        title: 'Pago realizado con exito.',
                        text: 'Gracias por confiar su salud en nosotros.',
                        showConfirmButton: true,

                    })
                }

            });
    }
});

formfech.inputFecha.addEventListener('keyup', (e) => {
    let valorFecha = e.target.value;
    formfech.inputFecha.value = valorFecha.replace(/\s/g, '').replace(/\D/g, '').replace(/([0-9]{2})/g, '$1  ').trim();

    if (valorFecha[5] >= 0 && valorFecha[5] <= 9) {
        let cardcvv = document.getElementById("CVV").value;
      //  alert("se pusheo ultimo digito de fecha");
        if (cardcvv > 3) {
            botonaceptar.style.display = 'block';
        }
    } else {
        botonaceptar.style.display = 'none';
    }

    if (valorFecha[0] >= 1) {
        if (valorFecha[1] >= 3 && valorFecha[1] <= 99) {
            Swal.fire({
                icon: 'error',
                title: 'El mes colocado no es correcto, por favor verificar',
                showConfirmButton: false,
                timer: 1300,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }
    if (valorFecha[0] >= 2) {
        if (valorFecha[1] >= 0 && valorFecha[1] <= 99) {
            Swal.fire({
                icon: 'error',
                title: 'El mes colocado no es correcto, por favor verificar',
                showConfirmButton: false,
                timer: 1300,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }
    if (valorFecha[4] <= 1) {
        if (valorFecha[5] >= 0 && valorFecha[5] <= 99) {
            Swal.fire({
                icon: 'error',
                title: 'No es posible colocar años pasados',
                showConfirmButton: false,
                timer: 1300,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }
    if (valorFecha[4] <= 2) {
        if (valorFecha[5] == 0) {
            Swal.fire({
                icon: 'error',
                title: 'No es posible colocar años pasados',
                showConfirmButton: false,
                timer: 1300,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        }
    }
});

formcvv.CVV.addEventListener('keyup', (e) => {
    let valorcvv = e.target.value;
    let cardcvv = document.getElementById("CVV").value;
    formcvv.CVV.value = valorcvv.replace(/\s/g, '').replace(/\D/g, '')
    if (cardcvv >= 0) {
        botonaceptar.style.display = 'none';
    }
    if (valorcvv[3] >= 0 && valorcvv[3] <= 9) {
        botonaceptar.style.display = 'block';
        // alert("se pusheo el utimo digito");
    }

});


seleccionarpago();






