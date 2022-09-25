let usuarioExiste=false;

const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
});

/*VERIFICA ENTRENADOR AUTOMATICAMENTE*/
const inputDNI=document.querySelector("#numero-DNI").addEventListener("keyup",()=>{
    let DNI=document.querySelector("#numero-DNI").value;
    let nombres=document.querySelector("#nombres");
    let apellidos=document.querySelector("#apellidos");

    if(DNI.length==8){
        
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/nuevo_contrato_controlador.php';

        ajax.open('POST',URL,true);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('numero-DNI='+ DNI);

        ajax.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){
                try{
                    let datos=JSON.parse(this.responseText);
                    nombres.value=datos.nombre;
                    apellidos.value=datos.apellido;

                    usuarioExiste=true;
                }catch{
                    alertas.fire({
                        icon: 'error',
                        title: 'ENTRENADOR NO REGISTRADO'
                    });
                    usuarioExiste=false;
                }
            }
        }
    }else{
        nombres.value='';
        apellidos.value='';
    }
});

/*SI SE CAMBIA EL VALOR DEL SELECT*/
const selectTtrabajo=document.querySelector("#tiempo-trabajo").addEventListener("change",()=>{
    let tTrabajo=document.querySelector("#tiempo-trabajo").value;
    let sueldoTotal=document.querySelector("#sueldo-total");
    let aumento=parseInt(document.querySelector("#aumento").value);

    if(tTrabajo=='TIEMPO COMPLETO'){
        if(isNaN(aumento)){
            sueldoTotal.value='S/1200.00';
        }else{
            sueldoTotal.value='S/'+ (1200+aumento) + '.00';
        }
        
    }else{
        if(isNaN(aumento)){
            sueldoTotal.value='S/600.00';
        }else{
            sueldoTotal.value='S/'+ (600+aumento) + '.00';
        }
    }
});

/*SI SE CAMBIA EL VALOR DEL DESCUENTO*/
const inputAMTO=document.querySelector("#aumento").addEventListener("keyup",()=>{
    let tTrabajo=document.querySelector("#tiempo-trabajo").value;
    let aumento=parseInt(document.querySelector("#aumento").value);
    let sueldoTotal=document.querySelector("#sueldo-total");

    if(isNaN(aumento)){
        if(tTrabajo=='TIEMPO COMPLETO'){
            sueldoTotal.value='S/1200.00';
            
        }else{
            sueldoTotal.value='S/600.00';
        }
    }else{
        if(tTrabajo=='TIEMPO COMPLETO'){
            sueldoTotal.value='S/'+ (1200+aumento) + '.00';
            
        }else{
            sueldoTotal.value='S/'+ (600+aumento) + '.00';
        }
    }
});

/*CUANDO SE LE ENVIE EL FORMULARIO*/
const botonSubmit=document.querySelector(".btn-submit").addEventListener("click",(e)=>{
    e.preventDefault();

    let formulario=document.querySelector('.formulario-datos');

    if(!usuarioExiste){
        alertas.fire({
            icon: 'error',
            title: 'ENTRENADOR NO REGISTRADO'
        });
    }else{

        Swal.fire({
            title: '¿DESEA REGISTRAR EL CONTRATO?',
            text: "No podrás modificarla después",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, registrar',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
    
                let DNI=document.querySelector("#numero-DNI").value;
                let fechaInicio=document.querySelector("#fecha-inicio").value;
                let fechaFinal=document.querySelector("#fecha-final").value;
                let tTrabajo=document.querySelector("#tiempo-trabajo").value;
                let sueldo=document.querySelector("#sueldo-total").value.replace("S/",' ').replace(".00",' ');

                const ajax = new XMLHttpRequest;
                const URL= '../controladores/administrador/nuevo_contrato_controlador.php';

                ajax.open('POST',URL,true);
                ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                ajax.send('numero-DNI='+ DNI +'&fecha-inicio='+fechaInicio +'&fecha-final='+fechaFinal+
                        '&tiempo-trabajo='+tTrabajo +'&sueldo='+sueldo);

                ajax.onreadystatechange = function(){
                    if(this.readyState ==4 && this.status==200){
                        alertas.fire({
                            icon: 'success',
                            title: 'Contrato añadido'
                        });

                        formulario.reset();
                        usuarioExiste=false;
                    }
                }
    
            }
        })        
    }
});