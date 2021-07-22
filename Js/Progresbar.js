 var bar = document.querySelector('.barrita')
 var num2 = document.querySelector('.E2')
 var num3 = document.querySelector('.E3')
 var sec2 = document.querySelector('.Dos')
 var sec3 = document.querySelector('.Tres')
 var container1 = document.querySelector('.section1')
 var container2 = document.querySelector('.section2')
 var container3 = document.querySelector('.section3Cita')
 
 $(document).ready(function () {
  var conta = 0; 
  var click=0;
  bar.style.width = 16 + '%';
  function count_click_add() {
    conta += 50;
   
    sec2.style.background = '#8bcde0';
    num2.style.color = 'white';
    container1.style.display = 'none';
    container2.style.display='block';
    container2.style.opacity='1';
    click+=1;
    if (conta<=100) {
     // bar.style.width = conta + '%';
    }
    if (click == 2) {
     // num3.style.color = 'white';
     // sec3.style.background = '#8bcde0'
    }
  }
   $("#boton1").click(function(){
     count_click_add();
     bar.style.width = 50 + '%';
     window.sr = ScrollReveal();
     sr.reveal('.section2', {
       duration: 2000,
   });
   });
   $("#boton2").click(function(){
    container2.style.display='none';
    container3.style.display='block';
    num3.style.color = 'white';
    sec3.style.background = '#8bcde0'
    bar.style.width = 100 + '%';
    container3.style.opacity='1';
    container2.style.opacity='0';
    
  });
  $("#botonante").click(function(){
    bar.style.width = 16 + '%';
    container1.style.display = 'block';
    container2.style.display='none';
    sec2.style.background='white';
    sec2.style.border='1px solid #8bcde0';
    num2.style.color='#959595';
    container1.style.opacity='1';
   

  });
  $("#botonantesec3").click(function(){
    bar.style.width = 50 + '%';
    container2.style.display = 'block';
    container3.style.display='none';
    sec3.style.background='white';
    sec3.style.border='1px solid #8bcde0';
    num3.style.color='#959595';
    container2.style.opacity='1';
    
  });
   $(".horas").on("click", function(){
    $(".horas").removeClass("seleccionado");
    $(this).addClass("seleccionado");
  });
 });


