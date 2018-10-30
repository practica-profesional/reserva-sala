		var vdescanso=16;
		var vtrabajo=9;
		var segundos = vtrabajo;
		var trabajo=false;



function cambiar(){

if (trabajo){
		document.getElementById('derecha').style.background='#A42020';
		document.getElementById('titulo').innerHTML="Trabajo";
		segundos = vtrabajo ;
	}else{
		document.getElementById('derecha').style.background='#3D890A';
		document.getElementById('titulo').innerHTML="Descanso";
		segundos = vdescanso ;
	}

}


function activar_reloj() {
cambiar();
miTimer();
}

var interval0 = setInterval(miTimer, 1000);
    
	function miTimer() {

	
    if(segundos <11){
    document.getElementById('reloj').innerHTML = "0" + --segundos;	
    }else{
    document.getElementById('reloj').innerHTML = --segundos;	
    }
    

    if (segundos<=0)
    {
       document.getElementById('reloj').innerHTML = "00";
       /*clearInterval(interval);*/
       	
		trabajo=!trabajo;
		activar_reloj();
    }
}


function limpia_timer(){
	clearInterval(interval0);
}

function inicia_trabajo() {
limpia_timer();
interval0 = setInterval(miTimer, 1000);
vtrabajo=document.getElementById('trabajo').value;
vdescanso=document.getElementById('descanso').value;
vtrabajo++;
vdescanso++;
if(vdescanso<vtrabajo){
	alert("los valores de Descanso deben ser mayores que Trabajo, se restableceran los valores iniciales");
		vdescanso=16;
		vtrabajo=9;
		document.getElementById('trabajo').value= vtrabajo-1;
		document.getElementById('descanso').value= vdescanso-1;
}


trabajo=false;
activar_reloj();
}


