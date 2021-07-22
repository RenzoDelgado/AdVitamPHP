gsap.from('.ViewHeaderUp', {
    duration: 1,
    y: -20
});

gsap.from('.HeaderDown', {
    duration: 1,
    x: 25
});

$(document).ready(function () {
    $("#botonBars").click(function () {

        gsap.to('.barrs', {
            duration: 1,
            x: 200,
            // rotate: 360
        });

    });

    $("#botonCerrar").click(function () {
        let cerrar = gsap.timeline({
            repeat: 0,
        });
        gsap.to('.barrs', {
            ease: 'bounce.out',
            duration: 1,
            x: -3,
        });

        cerrar.to('.btn-close', {
            rotate: 360,
        });

    });

    
    $("#butonmasinformacion").click(function () {
     
        gsap.to('.collapse', {
         // duration: 1,
         //   y: 20
        });

    });




});



