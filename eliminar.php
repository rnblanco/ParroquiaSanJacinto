<?php

require_once("sessions.php");

$writerBtn = '<li class="nav-item active"><a class="nav-link" href="escritor.php">Escritor</a></li>';

$url = $_SERVER["REQUEST_URI"];

$datos = explode("?", $url);

//Articulo
if (ctype_digit($datos[1]))
{
    if ($_SESSION['usuario']['Type'] == 1)
    {
        $buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE ID = :id AND (Estado = 1 OR Estado = 0) ORDER BY ID DESC');
        $buscar -> execute(array(':id' => $datos[1]));
        $row = $buscar -> rowCount();
    }
    else
    {
        $buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE ID = :id AND User_ID = :user AND (Estado = 1 OR Estado = 0) ORDER BY ID DESC');
        $buscar -> execute(array(':id' => $datos[1], ':user' => $_SESSION['usuario']['ID']));
        $row = $buscar -> rowCount();
    }    

    if ($row == "1")
    {
        $articulo = $buscar -> fetchAll();
        $articulo = $articulo[0];
        $Fecha = explode("-", $articulo['Fecha']);
        $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];
        $adminHTML = '';

        if($articulo['Estado'] == 1)
        {
            $estado = 'Activo';
            $estado2 = 'Inactivo';
        }
        else
        {
            $estado = 'Inactivo';
            $estado2 = 'Activo';
        }

        if ($_SESSION['usuario']['Type'] == 1)
        {
            $buscar2 = $conn -> prepare('SELECT Nombre FROM usuarios WHERE ID = :id');
            $buscar2 -> execute(array(':id' => $articulo['User_ID']));
            $user = $buscar2 -> fetchAll();
            $user = $user[0]['Nombre'];

            $adminHTML = '<div class="col-md-12" style="padding-top: 10px;">
                            <div class="form-group">
                                <h2>Escritor:</h2><input class="form-control" name="Escritor" placeholder="Escritor" type="text" value="'.$user.'" disabled>
                            </div>
                          </div>';
        }        
    }
    else
    {
        header("Status: 301 Moved Permanently");
        header('Location: index.php');
        exit;
    }
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

//Eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar']))
{    
    $_SESSION['mensaje2'] = "";

    if ($_SESSION['usuario']['Type'] == 1)
    {
        $eliminar = $conn -> prepare('UPDATE publicaciones SET ImgName = :img, Estado = :est WHERE ID = :id');
        $eliminar -> execute(array(':est' => '3', ':img' => '', ':id' => $datos[1]));
    }
    else
    {
        $eliminar = $conn -> prepare('UPDATE publicaciones SET ImgName = :img, Estado = :est WHERE ID = :id AND User_ID = :user');
        $eliminar -> execute(array(':est' => '3', ':img' => '', ':id' => $datos[1], ':user' => $_SESSION['usuario']['ID']));
    }
    
    unlink('Imagenes/'.$articulo['ImgName']);
    $_SESSION['mensaje2'] = "<script>eliminadook()</script>";
    header("Status: 301 Moved Permanently");
    header('Location: escritor.php');                
    exit;
}

if ($_SESSION['usuario']['Type'] == 1 || $_SESSION['usuario']['Type'] == 2)
{
    require 'Views/eliminar.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>