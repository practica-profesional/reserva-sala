<?php
session_start();

//Fichero de conexion con l base de datos
include_once("db.php");

$varSalas=$_POST['text-dropdownMenuSalas'];
$varQuien=$_POST['txtQuienEnviar'];
$varCantPers=$_POST['text-cantpers'];
$varInicio=$_POST['text-horaInicio'];
$varFin=$_POST['horaFin'];
//$varFin=$_POST['text-horaFin'];

$varTipoUso=$_POST['text-tipouso'];
$para="marcelo.fajardo@gmail.com, marce.quelocura@gmail.com";
$subject="Reserva de Salas";

$msjCorreo="La persona: " . $varQuien;
$msjCorreo= $msjCorreo . "<br>\n Ha reservado la sala: " . $varSalas . "<br>\n Para la cantidad de personas: " . $varCantPers;
$msjCorreo=$msjCorreo . "<br>\n Hora de inicio: " . $varInicio;
$msjCorreo=$msjCorreo . "<br>\n Hora de fin: " . $varFin;
$msjCorreo=$msjCorreo . "<br>\n con la finalidad: " . $varTipoUso;

      $headers = 'From' . " " . $varQuien . "\r\n";
      $headers .= "Content-type: text/html; charset=utf-8";

//mail("marcelo.fajardo@gmail.com","Formulario recibido",$varSalas);
/*if (mail($para, $subject, $msjCorreo, $headers)) {
         echo "<script language='javascript'>
            alert('Mensaje enviado, muchas gracias.');
         </script>";
         $msg="prueba de mensaje" . $varSalas ;
    } else {
         echo "<script language='javascript'>
            alert('fallado');
         </script>";
         $msg="no se envio el mensaje " . $varSalas ;
    }*/
$msg="prueba de mensaje" . $varFin ;

$_SESSION['mensaje'] = "<div class='alert alert-danger' role='alert'>$msg<button
type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
header("Location: index.php");


?>
