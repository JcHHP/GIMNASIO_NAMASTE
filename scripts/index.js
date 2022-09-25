const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2500
});

let REGEX_correo= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
let valoresAceptados = /^[0-9]+$/;

const recuperar_contraseña= document.querySelector("#a-recuperar").addEventListener("click",()=>{
    Swal.fire({
        title: 'INGRESA TU NUMERO DE DNI',
        input: 'text',
        inputAttributes: {
        autocapitalize: 'off'
        },showCancelButton: true,
        confirmButtonText: 'ACEPTAR',
        cancelButtonText: 'CANCELAR',
        cancelButtonColor: '#dc3545',
        showLoaderOnConfirm: true,
        inputValidator: (DNI) => {
            if (!valoresAceptados.test(DNI)) {
                Swal.fire({
                    icon: 'error',
                    text: 'El DNI debe estar compuesto solo por números'
                })
    
            }else if(DNI.length<8){
                Swal.fire({
                    icon: 'error',
                    text: 'El DNI debe estar compuesto por 8 dígitos'
                })

            }
            else{
                Swal.fire({
                    icon: 'success',
                    text: 'Procesando...'
                })
            }
        }
    });
});

const boton_ingresar= document.querySelector("#boton-ingresar").addEventListener("click",(e)=>{
    e.preventDefault();

    let DNI= document.querySelector(".input-DNI").value;
    let contraseña= document.querySelector(".input-contraseña").value.replace(/ /g,'');

    if(!valoresAceptados.test(DNI)){
        alertas.fire({
            icon: 'error',
            title: 'EL DNI SOLO PUEDE ESTAR COMPUESTO POR NUMEROS'
        });

    }else if(DNI.length!=8){
        alertas.fire({
            icon: 'error',
            title: 'NUMERO DE DNI INVALIDO'
        });

    }else if(contraseña.length<8){

        alertas.fire({
            icon: 'error',
            title: 'LA CONTRASEÑA DEBE ESTAR CONFORMADA DE 8 CARACTERES COMO MINIMO'
        });
    }else{

        const ajax = new XMLHttpRequest;
        const URL= 'controladores/index_controlador.php';

        ajax.open('POST',URL,true);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('input-DNI='+ DNI +'& input-contraseña='+ contraseña);

        ajax.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){

                if(this.responseText == 'Usuario no registrado'){
                    alertas.fire({
                        icon: 'error',
                        title: 'USUARIO NO REGISTRADO EN EL SISTEMA'
                    });

                }else if(this.responseText == 'Contraseña incorrecta'){
                    alertas.fire({
                        icon: 'error',
                        title: 'LA CONTRASEÑA INGRESADA ES INCORRECTA'
                    });

                }else{

                    location.replace(this.responseText);                    
                }
            }
        }

    }
});
