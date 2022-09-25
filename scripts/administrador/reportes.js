const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2500
});

//MATRICULAS
const test = document.querySelector("#btn-matriculas").addEventListener("click", async function principal(){

    const steps = ['1','2','3'];
    const Queue = Swal.mixin({
        progressSteps: steps,
        confirmButtonText: 'ACEPTAR',
    
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' }
    })

    let periodo;
    const {value: tipo_reporte}= await Queue.fire({
        text: 'SELECCIONA EL PERIODO DE REPORTE A GENERAR',
        input: 'select',
        inputOptions:{
            mensual:"Mensual",
            anual:"Anual"
        },

        currentProgressStep: 0,
        showClass: { backdrop: 'swal2-noanimation' },
    })
    periodo=tipo_reporte;

    let año_mes;
    if(tipo_reporte=='anual'){
        const {value:año} = await Queue.fire({
            text: 'Selecciona el año',
            input: 'select',
            inputOptions:{
                2021:"2022",
                2022:"2021"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        año_mes=año;
    }else{
        const {value:mes} = await Queue.fire({
            text: 'Selecciona el mes',
            input: 'select',
            inputOptions:{
                1:"Enero", 2:"Febrero", 3:"Marzo", 4:"Abril", 5:"Mayo", 6:"Junio",
                7:"Julio", 8:"Agosto", 9:"Setiembre", 10:"Octubre", 11:"Noviembre", 12:"Diciembre"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        año_mes=mes;
    }

    
    let DNI_cliente;
    let valoresAceptados = /^[0-9]+$/;
    await Queue.fire({
        text: 'Ingresa el numero de DNI del cliente',
        input: 'text',
        inputPlaceholder: 'Número de DNI',
        currentProgressStep: 2,
        inputAttributes: {
            maxlength: 8,
        },
        inputValidator: (DNI) => {
            if (!valoresAceptados.test(DNI)) {
                return "El DNI debe estar compuesto solo por números";
    
            }else if(DNI.length<8){
                return 'El DNI debe estar compuesto por 8 dígitos';

            }
            else{
                let existe=false;
                const ajax = new XMLHttpRequest;
                const URL= '../controladores/administrador/reportes_controlador.php';

                ajax.open('POST',URL,false);
                ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                ajax.send('DNI_cliente=' + DNI);

                if(ajax.responseText==1){
                    existe=true;
                    DNI_cliente=DNI;
                }else{
                    alert (ajax.responseText);
                }

                if(existe){

                    const ajax2 = new XMLHttpRequest;
    
                    ajax2.open('POST',URL,false);
                    ajax2.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    ajax2.send('DNI=' + DNI_cliente +'&periodo=' + periodo + '&añomes=' + año_mes);
                    
                    if(ajax2.responseText!='no existe'){
                        datos= JSON.parse(ajax2.responseText);

                        nombre=datos.NOMBRE;
                        fecha=datos.FECHA;
                        plan=datos.PLAN;
                        pago=datos.PAGO;

                        window.open ('../controladores/administrador/reportes/matricula_mensual.php?usuario='+ DNI +'&nombre='+ nombre +'&fecha='+ fecha +'&plan='+ plan +'&pago='+ pago);
                    }else{
                        alertas.fire({
                            icon: 'error',
                            title: 'EL CLIENTE NO TIENE UNA MATRICULA EN EL MES INDICADO'
                        });
                    }

                    

                }else{
                    return "Cliente no registrado";
                }
            }
        },

        confirmButtonText: 'DESCARGAR',
        showClass: { backdrop: 'swal2-noanimation' },
    })
});

