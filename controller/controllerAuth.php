<?php

include_once '../model/usuario.php';
$email  = $_POST['email'];
$password = $_POST['pass'];
$u = usuario::validarInicio($email,$password);

if($u == null)
{
    header ("Location: ../index.php?mensaje=Datos incorrectos");
}else
{
   session_start();
   $_SESSION['usuario'] = serialize($u);
   header ("Location: ../core/listadodeavaluo.php");
}


?>