<?php
include_once '../model/usuario.php';
session_start();   
if(!isset($_SESSION) || empty($_SESSION))
{
    header ("Location: ../index.php");
}
$Usuario = unserialize($_SESSION['usuario']);
$opc = $_POST['opc'];
switch($opc)
{
    case 1: Create($Usuario); break;
    case 2: Update($Usuario); break;
    case 3: Delete($Usuario); break;
    case 4: Filtrar(); break;
    case 5: CambioPassword($Usuario); break;
    default: 
        $error = (object) ['estado' => 0,'mensaje' => 'Opción incorrecta'];   
        echo json_encode($error); 
    break;
}


function Create($U)
{  
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $clave = $_POST['password'];
    $opciones = ['cost'=>12,];
    $clave = password_hash($clave, PASSWORD_BCRYPT, $opciones);
    $modelo = new usuario();
    $modelo->nombre = $nombre;
    $modelo->correo = $correo;
    $modelo->password = $clave;
    $modelo->idRegistradoPor = $U->id; 
    $modelo->idModificadoPor = $U->id;       
    $response = $modelo->registrar();
  
    if($response->estado){
        header ("Location: ../core/listarusuario.php");
    }
    else
    {
        $url = "Location: ../core/crearUsuario.php?nombre=".$nombre."&"."email=".$correo."&mensaje=".$response->mensaje;
        header ($url);  
    }
}
function Update($U)
{

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $modelo = new usuario();
    $modelo->get( $id);
    $modelo->nombre = $nombre;
    $modelo->correo = $correo;
    $modelo->idModificadoPor = $U->id;       
    $response = $modelo->modificar();
    if($response->estado){
        header ("Location: ../core/listarusuario.php");
    }
    else
    {
        $url = "Location: ../core/editarUsuario.php?nombre=".$nombre."&"."email=".$correo."&mensaje=".$response->mensaje . "&id=".$id;
        header ($url);  
    }

}
function Delete($U)
{
    $id = $_POST['id'];
    $u = new usuario();
    $u->get($id);
    $u->estado = 'Inactivo';  
    $u->idModificadoPor = $U->id;    
    $u->modificar();
    $request = (object) ['estado' => 1,'mensaje' => 'Se inactivo usuario exitosamente'];
    echo json_encode($request);
    die();
}
function Filtrar()
{
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $start =$_POST['start'];
    $end   =$_POST['end'];
    $result = usuario::filtrar($nombre,$correo,$start,$end,'Activo');
    $response = (object) ['estado' => 1, 'mensaje' => 'successful process', 'data'=>$result];   
    echo json_encode($response);
}

function CambioPassword($U)
{
    $id = $U->id;
    $password = $_POST['CambioPassword0'];
    $PasswordNuevo = $_POST['CambioPassword1'];
    $user = new usuario();
    $user->get($id);
    if(password_verify($password,$user->password))
    {
        $opciones = ['cost'=>12,];
        $passwordhash = password_hash($PasswordNuevo, PASSWORD_BCRYPT, $opciones);        
        $user->password = $passwordhash;
        $user->idModificadoPor = $U->id;       
        $response = $user->modificar();
        if($response->estado)
        {
            $response = (object) ['estado' => 1, 'mensaje' => 'Cambio de clave exitosa', 'data'=>null];
            echo json_encode($response); 
        }else
        {
            $response = (object) ['estado' => 0, 'mensaje' => $response->mensaje, 'data'=>null];   
            echo json_encode($response);
        }
    }else
    {
        $response = (object) ['estado' => 0, 'mensaje' =>'Contraseña Actual es incorrecta', 'data'=>null];   
        echo json_encode($response);
    }       
   
}


?>