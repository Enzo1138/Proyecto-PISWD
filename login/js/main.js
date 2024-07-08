const $username = document.getElementById("username");
const $password = document.getElementById("contrasena");
const $submit = document.getElementById("ingresar");

document.addEventListener("click", (e)=>{
    if(e.target === $submit){
        if($password.value !== "" && $username.value !== ""){
            e.preventDefault();
            window.location.href = ""
        }
    }
})