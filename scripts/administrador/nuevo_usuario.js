const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
});

const botonSubmit= document.querySelector(".btn-submit").addEventListener("click",(e)=>{
    e.preventDefault();
    
    let formulario=document.querySelector('.formulario-datos');
    let numeroDNI= document.querySelector('#numero-DNI').value;
    let nombres = document.querySelector('#nombres').value;
    let apellidos = document.querySelector('#apellidos').value;
    let sexo = document.querySelector('#sexo').value;
    let fnacimiento = document.querySelector('#fecha-nacimiento').value;
    let nentrenamiento = document.querySelector('#nivel-entrenamiento').value;
    let telefono = document.querySelector('#telefono').value;
    let correo = document.querySelector('#correo-electronico').value;

    let REGEX_correo= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let valoresAceptados = /^[0-9]+$/;

    if(!usuarioExiste){
        alertas.fire({
            icon: 'error',
            title: 'NUMERO DE DNI INVALIDO'
        });

    }else if(sexo=='' ||  sexo.length<8 || fnacimiento=='' || nentrenamiento=='' || telefono.length!=9){
        alertas.fire({
            icon: 'error',
            title: 'COMPLETE CORRECTAMENTE TODOS LOS CAMPOS'
        });

    }else if(!valoresAceptados.test(telefono)){
        alertas.fire({
            icon: 'error',
            title: 'EL NUMERO DE TELEFONO SOLO PUEDE ESTAR COMPUESTO POR NUMEROS'
        });
    }else if(!REGEX_correo.test(correo)){

        alertas.fire({
            icon: 'error',
            title: 'FORMATO DE EMAIL INVALIDO'
        });
        
    }else{

        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/nuevo_cliente_controlador.php';

        ajax.open('POST',URL,true);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('numero-DNI='+ numeroDNI +"&nombres="+ nombres +"&apellidos="+ apellidos +"&sexo="+ sexo
                +"&fecha-nacimiento="+ fnacimiento +"&nivel-entrenamiento="+ nentrenamiento
                +"&telefono="+ telefono +"&correo-electronico="+ correo);

        ajax.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){

                if(this.responseText=='Con duplicados'){
                    alertas.fire({
                        icon: 'error',
                        title: 'EL CLIENTE YA SE ENCUENTRA REGISTRADO'
                    });

                }else if(this.responseText=='Telefono duplicado'){
                    alertas.fire({
                        icon: 'error',
                        title: 'EL TELEFONO YA SE ENCUENTRA REGISTRADO'
                    });

                }else if(this.responseText=='Correo duplicado'){
                    alertas.fire({
                        icon: 'error',
                        title: 'EL CORREO YA SE ENCUENTRA REGISTRADO'
                    });
                    
                }else{
                    Swal.fire({
                        title: '¿DESEA AÑADIR UN NUEVO CLIENTE?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, añadir',
                        cancelButtonText: 'Cancelar'
                      }).then((result) => {
                        if (result.isConfirmed) {
                
                            alertas.fire({
                                icon: 'success',
                                title: 'CLIENTE AGREGADO CORRECTAMENTE'
                            });
        
                            formulario.reset();
                            usuarioExiste=false;
                        }
                    })

                }
            }
        }
    }
});