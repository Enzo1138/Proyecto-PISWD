async function getAlumnos(){
    try {
        let resp = await fetch("http://localhost/login/php/submenu%20alumno/alumno.php?op=listregistros");
        json = await resp.json();
        if(json.status){
            let data = json.data;
            data.forEach(item =>{
                let newtr = document.createElement("tr");
                newtr.id = "row_"+item.NroMatricula;
                newtr.innerHTML = `<tr>
                                    <th scope="row">${item.NroMatricula}</th>
                                    <td>${item.Nombre}</td>
                                    <td>${item.Edad}</td>
                                    </tr>`;
                document.querySelector("#tblbodyalumnos").appendChild(newtr);
            });   
        }
        console.log(json);
    } catch (err) {
        console.log("ocurrio un error: "+err);
    }
}
if(document.querySelector("#tblbodyalumnos")){
getAlumnos();
}

if(document.querySelector("#formaltalum")){
    let frmaltalum = document.querySelector("#formaltalum");
    frmaltalum.onsubmit = function(e){
        fntGuardar();
    }
    async function fntGuardar(){
        let strNroMatricula = document.querySelector("#Nromat").value;
        let strNombre = document.querySelector("#Nombre").value;
        let strFecha = document.querySelector("#Fecha").value;
        if(strNroMatricula == "" || strNombre == "" || strFecha == ""){
            return;
        }
        try{
            const data = new FormData(frmaltalum);
            let resp= await fetch("http://localhost/login/php/submenu%20alumno/alumno.php?op=registro",{
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

if(document.querySelector("#formmodalum")){
    let frmeditar = document.querySelector("#formmodalum");
    frmeditar.onsubmit = function(e){
        fntEditar();
    }
    async function fntEditar(){
        let strNroMatricula = document.querySelector("#Nromat").value;
        let strNombre = document.querySelector("#Nombre").value;
        let strFecha = document.querySelector("#Fecha").value;
        if(strNroMatricula == "" || strNombre == "" || strFecha == ""){
            return;
        }
        try{
            const data = new FormData(frmeditar);
            let resp= await fetch("http://localhost/login/php/submenu%20alumno/alumno.php?op=modificar",{
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
 
if(document.querySelector("#formelialum")){
    let frmeliminar = document.querySelector("#formelialum");
    frmeliminar.onsubmit = function(e){
        fntEliminar();
    }
    async function fntEliminar(){
        let strNroMatricula = document.querySelector("#Nromat").value;
        if(strNroMatricula == ""){
            return;
        }
        try{
            const data = new FormData(frmeliminar);
            let resp= await fetch("http://localhost/login/php/submenu%20alumno/alumno.php?op=eliminar",{
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