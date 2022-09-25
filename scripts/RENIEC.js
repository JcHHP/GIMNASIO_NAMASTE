let usuarioExiste=false;

const botonBuscar= document.querySelector('#buscar-DNI').addEventListener('click',(e)=>{
    e.preventDefault();

    let numeroDNI= document.querySelector('#numero-DNI').value;
    let apellidos = document.querySelector('#apellidos');
    let nombres = document.querySelector('#nombres');
    let sexo = document.querySelector('#sexo').value;

    const ajax = new XMLHttpRequest;
    const URL= '../controladores/administrador/RENIEC.php';

    ajax.open('POST',URL,true);
    ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    ajax.send('dni='+numeroDNI);

    ajax.onreadystatechange = function(){
        if(this.readyState ==4 && this.status==200){
            let respuesta=JSON.parse(this.responseText);

            if(respuesta.nombres!=undefined && respuesta.nombres!=''){
                apellidos.value = respuesta.apellidoPaterno +" "+ respuesta.apellidoMaterno;
                nombres.value = respuesta.nombres;

                usuarioExiste=true;
            }else{
                alertas.fire({
                    icon: 'error',
                    title: 'NUMERO DE DNI INVALIDO'
                });

            }
            

        }else{
            apellidos.value = '';
            nombres.value = '';
            sexo.value = '';
        }
    }
});