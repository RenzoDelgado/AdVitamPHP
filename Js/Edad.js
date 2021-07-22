var edad = document.getElementById('edades');

var fecha = new Date();
edad.addEventListener("input", function(){
    var anoselect = document.getElementById("edades").value;
    var anoactual = fecha.getFullYear();
    var resultano;
    resultano = anoselect.substr(0,4);
    var edadtotal = anoactual - resultano;
    $("#inputedad").val(edadtotal);
});