window.onload = function(){
    let formu = document.getElementById("formu");
    let btnEnviar = document.querySelector('button[type="submit"]');

    //1. Funcionalidades

    //email
    let email = document.getElementsByName("email")[0];
    let remail = document.getElementsByName("remail")[0];

    email.addEventListener("input", function(){
        remail.value = email.value;
    });

    //textArea
    let textArea = document.getElementById("afiText");
    let chboxes = document.querySelectorAll("input[type='checkbox']");

    chboxes.forEach(function (chbox) {
        chbox.addEventListener("change", function () {
            textArea.value = "";
            let chboxMarcados = document.querySelectorAll("input[type='checkbox']:checked");

            chboxMarcados.forEach(function (chbox) {
                textArea.value += chbox.value + "\n";
            });
        });
    });

    //2. Reglas de validación

    //Tengo un problema a la hora de enviar el formulario
    //al asignar el evento de enviar al formulario, y con preventDefault
    //evito que se envie si algo esta mal, pero aun rellenando todo lo que tengo
    //no llega a enviarse. Sin embargo si cambio "formu" por "btnEnviar" el formulario
    //puede enviarse pero no es correcto.
    
    formu.addEventListener("submit", function (e) {
        e.preventDefault();
        //Añadiendo la funcion trim tras el valor recogido en cada campo,
        //se evita que el usuario introduzca espacios entre los valores a introducir
        let nombre = document.getElementsByName("nombre")[0].value.trim();
        let clave = document.getElementsByName("clave")[0].value.trim();
        let repiClave = document.querySelectorAll("input[type='password']")[1].value.trim();
        let respuesta = document.getElementsByName("respuesta")[0].value.trim();
        let edad = document.getElementsByName("edad")[0].value.trim();
        let captcha = document.querySelectorAll("input[type='text']")[5].value.trim();

        
        //ningun campo puede estar vacio
        if(!nombre || !clave || !repiClave || !respuesta || !edad || !captcha){
            alert("Ningun campo puede estar vacío");
        
        } else {
            //validacion de cada campo

            //validacion clave
            if(clave.length !== 8 || clave.value !== repiClave.value){
                alert("La longitud de la clave debe ser de 8 caracteres! y repetir clave debe ser igual");
                    clave.value = "";
                    repiClave.value = "";
                    clave.focus();
                    return false;
            }
            //validacion nombre
            if(nombre === clave){
                alert("la clave no puede ser igual al nombre");
                clave.focus();
                return false;
            }
            //validacion respuesta
            if(respuesta.length < 6){
                alert("la respuesta debe tener 6 caracteres");
                respuesta.focus();
                return false;
            }
            //validacion edad
            if(isNaN(edad) || edad < 3 || edad > 99){
                alert("edad debe ser un alfanumerico y estar comprendido entre 3 y 99 años")
                edad.focus();
                return false;
            }
            //validacion captcha
            const captchaPass = "QGPHJD";
            if(captcha !== captchaPass.toUpperCase()){
                alert("el código de la imagen debe ser el mismo introducido")
                captcha.focus();
                return false;
            }
        }
        
    });

    
};