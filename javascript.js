function login(){
	var user=document.getElementById("user").value;
	var pwd=document.getElementById("pwd").value;
	document.getElementById('user').style.border="1px solid grey";
	document.getElementById('pwd').style.border="1px solid grey";
	if (user =="" && pwd =="") {
		document.getElementById('user').style.border="1px solid red";
		document.getElementById('pwd').style.border="1px solid red";
		document.getElementById("mensaje").innerHTML="Los campos usuario y contraseña son obligatorios";
		document.getElementById('mensaje').style.display="block";
		return false;
	}else if (user =="") {
		document.getElementById('user').style.border="1px solid red";
		document.getElementById("mensaje").innerHTML="El campo usuario es obligatorio";
		document.getElementById('mensaje').style.display="block";
		return false;
	}else if (pwd=="") {
		document.getElementById('pwd').style.border="1px solid red";
		document.getElementById("mensaje").innerHTML="El campo contraseña es obligatorio";
		document.getElementById('mensaje').style.display="block";
		return false;
	}
	return true;

}

function incidencia(){
	var coment=document.getElementById("descripcion").value;
	document.getElementById('descripcion').style.border="1px solid grey";
	if (coment=="") {
		document.getElementById("mensaje2").innerHTML="Describa el problema del objeto o sala";
		document.getElementById('descripcion').style.border="1px solid red";
		return false;
	}
	return true;
}

function validacionRegistroUsers(){
	var user = document.getElementById('usuario').value;
	var nombre = document.getElementById('nombre').value;
	var pass = document.getElementById('pass').value;
	var pass2 = document.getElementById('pass2').value;
    var mensaje='Errores:<br><br>';

if (user=='' || nombre=='' || pass=='' || pass2==''){
        if(user==''){
            mensaje=mensaje+'- Usuario<br>';
            showErrors=true;
        }
        if(nombre==''){
            mensaje=mensaje+'- Nombre<br>';
            showErrors=true;
        }
        if(pass==''){
            mensaje=mensaje+'- Password<br>';
            showErrors=true;
        }else if(pass2==''){
            mensaje=mensaje+'- Confirmar Password<br>';
            showErrors=true;
        }
        else if(!(pass == pass2)){
            mensaje=mensaje+'- Las contraseñas no coinciden<br>';
            showErrors=true;
        }
        if(showErrors=true){
            document.getElementById('mensaje').innerHTML=mensaje;
            respuesta=false
            return false;
        }else{
        	return true;
        }
    }else{
        
     if(pass == pass2){
    	    document.getElementById('mensaje').innerHTML='';
            respuesta=true;
            showErrors=false;
            return true;
    }else{
    	    mensaje=mensaje+'- Las contraseñas no coinciden<br>';
            document.getElementById('mensaje').innerHTML=mensaje;
            respuesta=false
            return false;
    }
}
}