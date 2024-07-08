async function getVinculos(){
    try{
        let resp = await fetch("http://localhost/login/php/submenu%20vinculo/vinculo.php?op=listregistros");
        json = await resp.json();
        if(json.status){
            let data = json.data;
            data.forEach((item) => {
                let newtr = document.createElement("tr");
                newtr.id = "row_"+item.Materia_Id;
                newtr.innerHTML = `<tr>
                <th scope="row">${item.Materia_Id}</th>
                <td>${item.Alumno_NroMatricula}</td>
                </tr>`;
                document.querySelector("#tblbodyvinculo").appendChild(newtr);
            });
        }
    }catch(err){
        console.log("Ocurrio un error: "+err);
    }
}
if(document.querySelector("#tblbodyvinculo")){
    getVinculos();
}

if(document.querySelector("#formaltavin")){
    let frmregistro = document.querySelector("#formaltavin");
    frmregistro.onsubmit = function(e){
        e.preventDefault();
        fntGuardar();
    }
    async function fntGuardar(){
        let strId = document.querySelector("#Id").value;
        let strNroMatricula = document.querySelector("#NroMat").value;
        if(strId == "" || strNroMatricula == ""){
            return;
        }
        try{
            const data = new FormData(frmregistro);
            let resp = await fetch("http://localhost/login/php/submenu%20vinculo/vinculo.php?op=registro",{
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: data
            });
            console.log(resp);
        }catch(err){
            console.log("Ocurrio un error: "+err)
        }
    }
}

if(document.querySelector("#formmodvin")){
    let frmeditar = document.querySelector("#formmodvin");
    frmeditar.onsubmit = function(e){
        fntEditar();
    }
    async function fntEditar(){
        let strId = document.querySelector("#Id").value;
        let strNroMat = document.querySelector("#NroMat").value;
        let strIdM = document.querySelector("#IdM").value;
        let strNroMatM = document.querySelector("#NroMatM").value;
        if(strId == "" || strNroMat == "" || strIdM == "" || strNroMatM == ""){
            return;
        }
        try{
            const data = new FormData(frmeditar);
            let resp= await fetch("http://localhost/login/php/submenu%20vinculo/vinculo.php?op=modificar",{
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

if(document.querySelector("#formelivin")){
    let frmeliminar = document.querySelector("#formelivin");
    frmeliminar.onsubmit = function(e){
        fntEliminar();
    }
    async function fntEliminar(){
        let strId = document.querySelector("#Id").value;
        let strNroMatricula = document.querySelector("#Nromat").value;
        if(strId == "" || strNroMatricula == ""){
            return;
        }
        try{
            const data = new FormData(frmeliminar);
            let resp= await fetch("http://localhost/login/php/submenu%20vinculo/vinculo.php?op=eliminar",{
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