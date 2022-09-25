//CUADROS PRINCIPALES DE VISUALIZACION
let spanIngresos=document.querySelector("#monto-ingresos");
let spanEgresos=document.querySelector("#monto-egresos");
let spanUtilidad=document.querySelector("#monto-utilidad");
let spanMes=document.querySelector("#mes-resumen");
let spanAño=document.querySelector("#año-resumen");

let meses=['ENERO','FEBRERO','MARZO','ABRIL','MAYO','JUNIO','JULIO','AGOSTO','SETIEMBRE','OCTUBRE','NOVIEMBRE','DICIEMBRE'];

const ajax = new XMLHttpRequest;
const URL= '../controladores/administrador/estado_cuentas_controlador.php';

ajax.open('POST',URL,true);
ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
ajax.send('cargar_montos=true');

ajax.onreadystatechange = function(){
    if(this.readyState ==4 && this.status==200){
        montosMes=JSON.parse(ajax.responseText);

        mes=meses[parseInt(montosMes[1])-1];
        año=montosMes[2];

        spanMes.textContent=' '+ mes;

        spanAño.textContent=' '+ año;
        
        spanIngresos.textContent='S/' + montosMes[0].Ingresos;
        spanEgresos.textContent='S/' + montosMes[0].Egresos;

        if(montosMes[0].Ingresos - montosMes[0].Egresos <0){
            spanUtilidad.textContent='-S/' + -1*(montosMes[0].Ingresos - montosMes[0].Egresos);
        }else{
            spanUtilidad.textContent='S/' + (montosMes[0].Ingresos - montosMes[0].Egresos);
        }
        
    }
}



//PARAMETROS Y OPCIONES DE LA PARTE VISUAL
const ingresos={
    label: 'INGRESOS',
    data: [],
    backgroundColor: [
        'rgba(75, 192, 192, 0.2)'
    ],
    borderColor: [
        'rgba(75, 192, 192, 1)'
    ],
    borderWidth: 1
};

const egresos={
    label: 'EGRESOS',
    data: [],
    backgroundColor: [
        'rgba(255, 99, 132, 0.2)'
    ],
    borderColor: [
        'rgba(255, 99, 132, 1)'
    ],
    borderWidth: 1
};

const utilidad={
    label: 'UTILIDAD',
    data: [],
    backgroundColor: [
        'rgba(255, 206, 86, 0.2)'
    ],
    borderColor: [
        'rgba(255, 206, 86, 1)'
    ],
    borderWidth: 1
};

//RELLENADO DE DATOS
let montosMeses;

const ajax2 = new XMLHttpRequest;
const URL2= '../controladores/administrador/estado_cuentas_controlador.php';
ajax2.open('POST',URL,false);
ajax2.setRequestHeader("content-type", "application/x-www-form-urlencoded");
ajax2.send('documento_cargado=true');

montosMeses=JSON.parse(ajax2.responseText);

for(i=0;i<12;i++){

    if(montosMeses[i].Ingresos==null){
        ingresos.data.push(0);

    }else{
        ingresos.data.push(montosMeses[i].Ingresos);

    }

    if(montosMeses[i].Egresos==null){
        egresos.data.push(0);

    }else{
        egresos.data.push(montosMeses[i].Egresos);

    }

    utilidad.data.push(ingresos.data[i]-egresos.data[i])
}

const canvasxd=document.querySelector("#estadisticas-canvas");
const myChart = new Chart(canvasxd, {
    type: 'bar',
    data: {
        labels: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SETIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'],
        datasets: [
            ingresos,
            egresos,
            utilidad
        ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});






