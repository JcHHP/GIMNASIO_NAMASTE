const alertas= Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000
});

const busqueda= document.querySelector("#input-busqueda").addEventListener("keyup",()=>{
    let DNI=document.querySelector("#input-busqueda").value;
    let tabla=document.querySelector("#tabla");

    if(DNI.length!=0){
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/registrar_asistencia_controlador.php';

        ajax.open('POST',URL,true);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('numero-DNI='+ DNI);

        ajax.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){
                tabla.innerHTML = this.responseText;
            }
        }
    }else{
        const ajax = new XMLHttpRequest;
        const URL= '../controladores/administrador/registrar_asistencia_controlador.php';

        ajax.open('POST',URL,true);
        ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
        ajax.send('valor-cero=0');

        ajax.onreadystatechange = function(){
            if(this.readyState ==4 && this.status==200){
                tabla.innerHTML = this.responseText;
            }
        }
    }
});

function registraAsistencia(DNI){
    Swal.fire({
        title: '¿DESEA REGISTRAR LA ASISTENCIA?',
        text: "No podrás modificarla después",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, registrar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {

            let fecha=  String(new Date().getFullYear()) +"/"+ String(new Date().getMonth() + 1) +"/"+ String(new Date().getDate());
            let hora= new Date().toLocaleTimeString();

            const ajax = new XMLHttpRequest;
            const URL= '../controladores/administrador/registrar_asistencia_controlador.php';

            ajax.open('POST',URL,true);
            ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            ajax.send('DNI-asistencia='+ DNI +'& fecha-actual='+ fecha +'& hora-actual='+hora);

            ajax.onreadystatechange = function(){
                if(this.readyState ==4 && this.status==200){
                    alertas.fire({
                        icon: 'success',
                        title: 'ASISTENCIA REGISTRADA'
                    });
                }
            }

        }
    })
}