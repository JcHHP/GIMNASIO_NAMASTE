let usuarioExiste=false;

const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
});

/*VERIFICA CLIENTE AUTOMATICAMENTE*/
const inputDNI=document.querySelector("#numero-DNI").addEventListener("keyup",()=>{
    let DNI=document.querySelector("#numero-DNI").value;
    let nombres=document.querySelector("#nombres");
    let apellidos=document.querySelector("#apellidos");

    if(DNI.length==8){
        
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/nueva_matricula_controlador.php';

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
                        title: 'USUARIO NO REGISTRADO'
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
const selectPlan=document.querySelector("#tipo-plan").addEventListener("change",()=>{
    let plan=document.querySelector("#tipo-plan").value;
    let montoTotal=document.querySelector("#monto-total");
    let descuento=parseInt(document.querySelector("#descuento").value);

    if(plan=='DIARIO'){
        if(isNaN(descuento)){
            montoTotal.value='S/100.00';
        }else{
            montoTotal.value='S/'+ (100-descuento) + '.00';
        }
        
    }else{
        if(isNaN(descuento)){
            montoTotal.value='S/60.00';
        }else{
            montoTotal.value='S/'+ (60-descuento) + '.00';
        }
    }
});

/*SI SE CAMBIA EL VALOR DEL DESCUENTO*/
const inputDCTO=document.querySelector("#descuento").addEventListener("keyup",()=>{
    let plan=document.querySelector("#tipo-plan").value;
    let descuento=parseInt(document.querySelector("#descuento").value);
    let montoTotal=document.querySelector("#monto-total");

    if(isNaN(descuento)){
        if(plan=='DIARIO'){
            montoTotal.value='S/100.00';
            
        }else{
            montoTotal.value='S/60.00';
        }
    }else{
        if(plan=='DIARIO'){
            montoTotal.value='S/'+ (100-descuento) + '.00';
            
        }else{
            montoTotal.value='S/'+ (60-descuento) + '.00';
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
            title: 'USUARIO NO REGISTRADO'
        });

    }else{
        let DNI=document.querySelector("#numero-DNI").value;
        let fechaInicio=document.querySelector("#fecha-inicio").value;
        let fechaFinal=document.querySelector("#fecha-final").value;
        let plan=document.querySelector("#tipo-plan").value;
        let sesiones;

        if(plan=='DIARIO'){
            sesiones=30;
        }else{
            sesiones=15;
        }
        
        let monto=document.querySelector("#monto-total").value.replace("S/",' ').replace(".00",' ');

        if(monto<0){
            alertas.fire({
                icon: 'error',
                title: 'MONTO TOTAL INVALIDO'
            });

        }else{

            Swal.fire({
                title: '¿DESEA REGISTRAR LA MATRICULA?',
                text: "No podrás modificarla después",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, registrar',
                cancelButtonText: 'Cancelar'
              }).then((result) => {
                if (result.isConfirmed) {
        
                    const ajax = new XMLHttpRequest;
                    const URL= '../controladores/administrador/nueva_matricula_controlador.php';
            
                    ajax.open('POST',URL,true);
                    ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    ajax.send('numero-DNI='+ DNI +'&fecha-inicio='+fechaInicio +'&fecha-final='+fechaFinal+
                              '&tipo-plan='+plan +'&sesiones='+sesiones +'&monto-total='+monto);
            
                    ajax.onreadystatechange = function(){
                        if(this.readyState ==4 && this.status==200){
                            alertas.fire({
                                icon: 'success',
                                title: 'Matricula añadida'
                            });
            
                            formulario.reset();
                            usuarioExiste=false;
                        }
                    }
        
                }
            })
            
        }
    }
});