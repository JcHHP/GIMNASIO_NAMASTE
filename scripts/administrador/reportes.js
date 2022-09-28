const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2500
});

//MATRICULAS
const matriculas = document.querySelector("#btn-matriculas").addEventListener("click", async function principal(){

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
                2022:"2022",
                2021:"2021"
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
                    alert(ajax.responseText)
                }

                if(existe){

                    const ajax2 = new XMLHttpRequest;
    
                    ajax2.open('POST',URL,false);
                    ajax2.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    ajax2.send('DNI=' + DNI_cliente +'&periodo=' + periodo + '&añomes=' + año_mes);
                   
                    if(ajax2.responseText!='no existe'){
                        if(periodo=='mensual'){
                            datos= JSON.parse(ajax2.responseText);

                            nombre=datos.NOMBRE;
                            fecha=datos.FECHA;
                            plan=datos.PLAN;
                            pago=datos.PAGO;
    
                            window.open ('../controladores/administrador/reportes/matricula_mensual.php?usuario='+ DNI +'&nombre='+ nombre +'&fecha='+ fecha +'&plan='+ plan +'&pago='+ pago);

                        }else{
                            datos= JSON.parse(ajax2.responseText);

                            let GET_URL='',posicion=1;


                            datos.forEach(elemento => {
                                
                                GET_URL+=`usuario${posicion}=${elemento.DNI}&nombre${posicion}=${elemento.NOMBRE}&fecha${posicion}=${elemento.FECHA}&plan${posicion}=${elemento.PLAN}&pago${posicion}=${elemento.PAGO}&`;
                                posicion+=1;
                            });

                            window.open ('../controladores/administrador/reportes/matricula_anual.php?'+GET_URL+'tamaño='+datos.length);

                        }
                       
                    }else{
                        if(periodo=='mensual'){
                            alertas.fire({
                                icon: 'error',
                                title: 'EL CLIENTE NO TIENE UNA MATRICULA EN EL MES INDICADO'
                            });

                        }else{
                            alertas.fire({
                                icon: 'error',
                                title: 'EL CLIENTE NO TIENE NINGUNA MATRICULA EN EL AÑO INDICADO'
                            });
                        }
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

//CONTRATOS

const contratos = document.querySelector("#btn-contratos").addEventListener("click", async function principal(){

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
                2022:"2022",
                2021:"2021"
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

    
    let DNI_entrenador;
    let valoresAceptados = /^[0-9]+$/;
    await Queue.fire({
        text: 'Ingresa el numero de DNI del entrenador',
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
                ajax.send('DNI_entrenador_busqueda=' + DNI);

                if(ajax.responseText==1){
                    existe=true;
                    DNI_entrenador=DNI;
                }

                if(existe){

                    const ajax2 = new XMLHttpRequest;
    
                    ajax2.open('POST',URL,false);
                    ajax2.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    ajax2.send('DNI_entrenador=' + DNI_entrenador +'&periodo=' + periodo + '&añomes=' + año_mes);
                   
                    if(ajax2.responseText!='no existe'){
                        if(periodo=='mensual'){

                            datos= JSON.parse(ajax2.responseText);
                            
                            nombre=datos.NOMBRE;
                            fecha=datos.FECHA;
                            tiempo=datos.TIEMPO;
                            sueldo=datos.SUELDO;
    
                            window.open ('../controladores/administrador/reportes/contrato_mensual.php?entrenador='+ DNI +'&nombre='+ nombre +'&fecha='+ fecha +'&tiempo='+ tiempo +'&sueldo='+ sueldo);

                        }else{

                            datos= JSON.parse(ajax2.responseText);

                            let GET_URL='',posicion=1;

                            datos.forEach(elemento => {
                                
                                GET_URL+=`entrenador${posicion}=${elemento.DNI}&nombre${posicion}=${elemento.NOMBRE}&fecha${posicion}=${elemento.FECHA}&tiempo${posicion}=${elemento.TIEMPO}&sueldo${posicion}=${elemento.SUELDO}&`;
                                posicion+=1;
                            });

                            window.open ('../controladores/administrador/reportes/contrato_anual.php?'+GET_URL+'tamaño='+datos.length);

                        }
                       
                    }else{
                        if(periodo=='mensual'){
                            alertas.fire({
                                icon: 'error',
                                title: 'EL ENTRENADOR NO TIENE UN CONTRATO EN EL MES INDICADO'
                            });

                        }else{
                            alertas.fire({
                                icon: 'error',
                                title: 'EL ENTRENADOR NO TIENE NINGUN CONTRATO EN EL AÑO INDICADO'
                            });
                        }
                    }

                }else{
                    return "Entrenador no registrado";
                }
            }
        },

        confirmButtonText: 'DESCARGAR',
        showClass: { backdrop: 'swal2-noanimation' },
    })
});

//ASISTENCIAS
const asistencias = document.querySelector("#btn-asistencias").addEventListener("click", async function principal(){

    const steps = ['1','2','3'];
    const Queue = Swal.mixin({
        progressSteps: steps,
        confirmButtonText: 'ACEPTAR',
    
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' }
    })

    const {value:año} = await Queue.fire({
        text: 'Selecciona el año',
        input: 'select',
        inputOptions:{
            2022:"2022",
            2021:"2021"
        },

        currentProgressStep: 0,
        confirmButtonText: 'ACEPTAR',
    })

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

    let DNI_entrenador;
    let valoresAceptados = /^[0-9]+$/;

    await Queue.fire({
        text: 'Ingresa el numero de DNI del usuario',
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
                ajax.send('DNI_usuario_busqueda=' + DNI);

                if(ajax.responseText==1){
                    existe=true;
                    DNI_usuario=DNI;
                }

                if(existe){

                    const ajax2 = new XMLHttpRequest;
    
                    ajax2.open('POST',URL,false);
                    ajax2.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                    ajax2.send('DNI_usuario=' + DNI_usuario +'&año=' + año + '&mes=' + mes);
                   
                    if(ajax2.responseText!='no existe'){

                        datos= JSON.parse(ajax2.responseText);

                        let GET_URL='',posicion=1;

                        datos.forEach(elemento => {
                            
                            GET_URL+=`usuario${posicion}=${elemento.DNI}&nombre${posicion}=${elemento.NOMBRE}&fecha${posicion}=${elemento.FECHA}&hora${posicion}=${elemento.HORA}&`;
                            posicion+=1;
                        });

                        window.open ('../controladores/administrador/reportes/asistencias.php?'+GET_URL+'&perfil='+datos[0].PERFIL +'&tamaño='+datos.length);
                       
                    }else{
                        alertas.fire({
                            icon: 'error',
                            title: 'EL USUARIO NO TIENE ASISTENCIAS EN EL MES INDICADO'
                        });
                    }

                }else{
                    return "Usuario no registrado";
                }
            }
        },

        confirmButtonText: 'DESCARGAR',
        showClass: { backdrop: 'swal2-noanimation' },
    })
});

//INGRESOS
const ingresos = document.querySelector("#btn-ingresos").addEventListener("click", async function principal(){

    const steps = ['1','2','3'];
    const Queue = Swal.mixin({
        progressSteps: steps,
        confirmButtonText: 'ACEPTAR',
    
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' }
    })

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

    let año_mes,año_;

    if(tipo_reporte=='anual'){
        const {value:añomes} = await Queue.fire({
            text: 'Selecciona el año',
            input: 'select',
            inputOptions:{
                2022:"2022",
                2021:"2021"
            },

            currentProgressStep: 1,
            confirmButtonText: 'DESCARGAR',
        })

        año_mes=añomes;
    }else{
        const {value:añomes} = await Queue.fire({
            text: 'Selecciona el mes',
            input: 'select',
            inputOptions:{
                1:"Enero", 2:"Febrero", 3:"Marzo", 4:"Abril", 5:"Mayo", 6:"Junio",
                7:"Julio", 8:"Agosto", 9:"Setiembre", 10:"Octubre", 11:"Noviembre", 12:"Diciembre"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        const {value:año} = await Queue.fire({
            text: 'Selecciona el año',
            input: 'select',
            inputOptions:{
                2022:"2022",
                2021:"2021"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        año_mes=añomes;
        año_=año;
    }

    if(tipo_reporte=='mensual'){
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/reportes_controlador.php';

        ajax.open('POST',URL,false);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('mes_ingreso=' + año_mes +'&año_ingreso=' + año_);


        if(ajax.responseText!= 'no existe'){
            datos= JSON.parse(ajax.responseText);
            let GET_URL='',posicion=1;

            datos.forEach(elemento => {
                
                GET_URL+=`fecha${posicion}=${elemento.FECHA}&nombre${posicion}=${elemento.NOMBRES}&monto${posicion}=${elemento.PAGO}&`;
                posicion+=1;
            });

            window.open ('../controladores/administrador/reportes/ingresos_mensual.php?'+GET_URL+'tamaño='+datos.length);
        }else{
            alertas.fire({
                icon: 'error',
                title: 'NO SE ENCONTRARON INGRESOS EN EL MES INDICADO'
            });
        }

    }else{
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/reportes_controlador.php';

        ajax.open('POST',URL,false);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('año_ingresos=' + año_mes);


        if(ajax.responseText!= 'no existe'){
            datos= JSON.parse(ajax.responseText);
            let GET_URL='',posicion=1;

            datos.forEach(elemento => {
                
                GET_URL+=`fecha${posicion}=${elemento.FECHA}&nombre${posicion}=${elemento.NOMBRES}&monto${posicion}=${elemento.PAGO}&`;
                posicion+=1;
            });

            window.open ('../controladores/administrador/reportes/ingresos_anual.php?'+GET_URL+'tamaño='+datos.length);
        }else{
            alertas.fire({
                icon: 'error',
                title: 'NO SE ENCONTRARON INGRESOS EN EL AÑO INDICADO'
            });
        }
    }
});

//EGRESOS
const egresos = document.querySelector("#btn-egresos").addEventListener("click", async function principal(){

    const steps = ['1','2','3'];
    const Queue = Swal.mixin({
        progressSteps: steps,
        confirmButtonText: 'ACEPTAR',
    
        showClass: { backdrop: 'swal2-noanimation' },
        hideClass: { backdrop: 'swal2-noanimation' }
    })

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

    let año_mes,año_;

    if(tipo_reporte=='anual'){
        const {value:añomes} = await Queue.fire({
            text: 'Selecciona el año',
            input: 'select',
            inputOptions:{
                2022:"2022",
                2021:"2021"
            },

            currentProgressStep: 1,
            confirmButtonText: 'DESCARGAR',
        })

        año_mes=añomes;
    }else{
        const {value:añomes} = await Queue.fire({
            text: 'Selecciona el mes',
            input: 'select',
            inputOptions:{
                1:"Enero", 2:"Febrero", 3:"Marzo", 4:"Abril", 5:"Mayo", 6:"Junio",
                7:"Julio", 8:"Agosto", 9:"Setiembre", 10:"Octubre", 11:"Noviembre", 12:"Diciembre"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        const {value:año} = await Queue.fire({
            text: 'Selecciona el año',
            input: 'select',
            inputOptions:{
                2022:"2022",
                2021:"2021"
            },

            currentProgressStep: 1,
            confirmButtonText: 'ACEPTAR',
        })

        año_mes=añomes;
        año_=año;
    }

    if(tipo_reporte=='mensual'){
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/reportes_controlador.php';

        ajax.open('POST',URL,false);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('mes_egreso=' + año_mes +'&año_egreso=' + año_);


        if(ajax.responseText!= 'no existe'){
            datos= JSON.parse(ajax.responseText);
            let GET_URL='',posicion=1;

            datos.forEach(elemento => {
                
                GET_URL+=`fecha${posicion}=${elemento.FECHA}&nombre${posicion}=${elemento.NOMBRES}&monto${posicion}=${elemento.PAGO}&`;
                posicion+=1;
            });

            window.open ('../controladores/administrador/reportes/egresos_mensual.php?'+GET_URL+'tamaño='+datos.length);
        }else{
            alertas.fire({
                icon: 'error',
                title: 'NO SE ENCONTRARON EGRESOS EN EL MES INDICADO'
            });
        }

    }else{
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/reportes_controlador.php';

        ajax.open('POST',URL,false);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('año_egresos=' + año_mes);


        if(ajax.responseText!= 'no existe'){
            datos= JSON.parse(ajax.responseText);
            let GET_URL='',posicion=1;

            datos.forEach(elemento => {
                
                GET_URL+=`fecha${posicion}=${elemento.FECHA}&nombre${posicion}=${elemento.NOMBRES}&monto${posicion}=${elemento.PAGO}&`;
                posicion+=1;
            });

            window.open ('../controladores/administrador/reportes/egresos_anual.php?'+GET_URL+'tamaño='+datos.length);
        }else{
            alertas.fire({
                icon: 'error',
                title: 'NO SE ENCONTRARON EGRESOS EN EL AÑO INDICADO'
            });
        }
    }
});