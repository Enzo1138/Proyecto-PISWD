async function getMaterias(){
    try{
        let resp = await fetch("http://localhost/login/php/submenu%20materia/materia.php?op=listregistros");
        json = await resp.json();
        if(json.status){
            let data = json.data;
            data.forEach((item) => {
                let newtr = document.createElement("tr");
                newtr.id = "row_"+item.Id;
                newtr.innerHTML = `<tr>
                <th scope="row">${item.Id}</th>
                <td>${item.Nombre}</td>
                </tr>`;
                document.querySelector("#tblbodymateria").appendChild(newtr);
            });
        }
    }catch(err){
        console.log("ocurrio un error: "+err);
    }
}
if(document.querySelector("#tblbodymateria")){
getMaterias();
}

if(document.querySelector("#formaltamate")){
    let frmregistro = document.querySelector("#formaltamate");
    frmregistro.onsubmit = function(e){
        e.preventDefault();
        fntGuardar();
    }
    async function fntGuardar(){
        let strId = document.querySelector("#Id").value;
        let strNombre = document.querySelector("#Nombre").value;
        if(strId == "" || strNombre == ""){
            return;
        }
        try{
            const data = new FormData(frmregistro);
            let resp = await fetch("http://localhost/login/php/submenu%20materia/materia.php?op=registro",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data
            });
        }catch(err){
            console.log("Ocurrio un error: "+err)
        }
    }
}
 
    if(document.querySelector("#formmodmate")){
        let frmeditar = document.querySelector("#formmodmate");
        frmeditar.onsubmit = function(e){
            e.preventDefault();
            fntEditar();
        }
        async function fntEditar(){
            let strId = document.querySelector("#Id").value;
            let strNombre = document.querySelector("#Nombre").value;
            if(strId == "" || strNombre == ""){
                return;
            }
            try{
                const data = new FormData(frmeditar);
                let resp = await fetch("http://localhost/login/php/submenu%20materia/materia.php?op=modificar",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                });
            }catch(err){
                console.log("Ocurrio un error: "+err)
            }
        }
    }

    if(document.querySelector("#formelimate")){
        let frmeliminar = document.querySelector("#formelimate");
        frmeliminar.onsubmit = function(e){
            fntEliminar();
        }    
        async function fntEliminar(){
            let strId = document.querySelector("#Id").value;
            if(strId == ""){
                return;
            }
            try{
                const data = new FormData(frmeliminar);
                let resp= await fetch("http://localhost/login/php/submenu%20materia/materia.php?op=eliminar",{
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    body: data
                });
            }catch(err){
                console.log("Ocurrio un error: "+err);
            }
     }
}