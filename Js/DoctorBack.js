var p = document.querySelector(".moreinfodoc");

window.onload = pageLoad();

function pageLoad() {
    var cboEspecialidad = document.getElementById("cboEspecialidad");

    let valorEspecialidad = cboEspecialidad.value;

    if (valorEspecialidad === "") {
        return;
    }

    MostrarDocxEspe();
}

function MostrarDocxEspe() {
    let valorCombo = cboEspecialidad.value;
    var template = "";
    var p = document.getElementById("traer");
    var idsum = "@ID";
    //console.log(valorCombo);
    for (var i = 1; i <= idsum; i++) {
        var info = $("#botoninfo_".concat(i));
        console.log(info);
    }

    var formData = new FormData();

    formData.append("valorCombo", valorCombo);

    fetch("php/DoctorxEspecialidad.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.json())
        .then((data) => {
            for (let valor of data) {
              
                template += `<div class="profiledoc">
				<img id="imgclick" src="${valor["fotodoc"]}" alt="No hay imagen del doc :(" >

                <button class="activo" type="button" data-bs-toggle="collapse"
                data-bs-target="#multiCollapseExample${valor["id"]}" aria-expanded="false"
                aria-controls="multiCollapseExample${valor["id"]}">Mas informacion</button>
    
                 <div class="collapse multi-collapse" id="multiCollapseExample${valor["id"]}">
                <div class="card moreinfodoc">
                <p class="info_doc">${valor["nombre"] + " " + valor["apellido"]}</p> 
                <p class="info_doc">Colegiatura: ${valor["colegiatura"]}</p> 
                <p class="info_doc">${valor["universidad"]}</p> 
                </div>
                 </div>
               
                </div>`;
            }
            p.innerHTML = template;
            // console.log(data); 
            // animate__animated animate__fadeIn
        });
}

cboEspecialidad.addEventListener("change", (event) => {
    MostrarDocxEspe();
});

