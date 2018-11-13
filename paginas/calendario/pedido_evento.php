<?php
session_start();

//Fichero de conexion con l base de datos
include_once("../../conexion.php");

/*$varSalas=$_POST['text-dropdownMenuSalas'];
$varQuien=$_POST['txtQuienEnviar'];
$varCantPers=$_POST['text-cantpers'];
$varInicio=$_POST['text-horaInicio'];
$varFin=$_POST['text-horaFin'];
$varTipoUso=$_POST['text-tipouso'];*/

$varSalas=$_POST['salas'];
$varQuien=$_POST['txtQuien'];
$varCantPers=$_POST['cantpers'];
$varInicio=$_POST['horaInicio'];
$varFin=$_POST['horaFin'];
$varTipoUso=$_POST['tipouso'];
$varFechaActual=$_POST['fechaActual'];

//$para="marcelo.fajardo@gmail.com, funesomar@gmail.com";
$para="marce.quelocura@gmail.com";
$para=$para . ", " . $varQuien;
$subject="Reserva de Salas";

$msjCorreo="La persona: " . $varQuien;
$msjCorreo= $msjCorreo . "\n Ha reservado la sala: " . $varSalas . "\n Para la cantidad de personas: " . $varCantPers;
$msjCorreo=$msjCorreo . "\n Para el día:   " . $varFechaActual;
$msjCorreo=$msjCorreo . "\n Hora de inicio: " . $varInicio;
$msjCorreo=$msjCorreo . "\n Hora de fin: " . $varFin;
$msjCorreo=$msjCorreo . "\n con la finalidad: " . $varTipoUso;

$msj="La persona: " . $varQuien;
$msj= $msj . "<br>\n Ha reservado la sala: " . $varSalas . "<br>\n Para la cantidad de personas: " . $varCantPers;
$msj=$msj . "<br>\n Para el día:   " . $varFechaActual;
$msj=$msj . "<br>\n Hora de inicio: " . $varInicio;
$msj=$msj . "<br>\n Hora de fin: " . $varFin;
$msj=$msj . "<br>\n con la finalidad: " . $varTipoUso;


      $headers = 'From' . " " . $varQuien . "\r\n";
      $headers .= "Content-type: text/html; charset=utf-8";

//mail("marcelo.fajardo@gmail.com","Formulario recibido",$varSalas);
if (mail($para, $subject, $msj, $headers)) {
         echo "<script language='javascript'>
            alert('Mensaje enviado, muchas gracias.');
         </script>";
         $msg="Envío exitoso del pedido<br>\n" . $msj ;
         $_SESSION['mensaje'] = "<div class='alert alert-success' role='success'>$msg<button
         type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
         header("Location: index.php");
    } else {
         echo "<script language='javascript'>
            alert('fallado');
         </script>";
         $msg="El mensaje no pudo ser enviado.<br>\n " . $msj ;
         $_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>$msg<button
         type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
         header("Location: index.php");
    }
//$msg="prueba de mensaje" . $varFin ;

?>
