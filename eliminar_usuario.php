<?php

require_once("sessions.php");

$adminBtn = '<li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Administración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="slider.php">Slider</a>
                <a class="dropdown-item" href="evangelios.php">Evangelio del Dia</a>
                <a class="dropdown-item" href="usuarios.php">Usuarios</a>
            </div>
</li>';

$url = $_SERVER["REQUEST_URI"];

$datos = explode("?", $url);

//Usuario
if (ctype_digit($datos[1]))
{
    $buscar = $conn -> prepare('SELECT * FROM usuarios WHERE ID = :id AND (Estado = 0 OR Estado = 1) AND (Type = 2 or Type = 3)');
    $buscar -> execute(array(':id' => $datos[1]));
    $row = $buscar -> rowCount();       

    if ($row == "1")
    {
        $user = $buscar -> fetchAll();
        $user = $user[0];

        if ($user['Estado'] == 1)
        {
            $estado = 'Activo';
            $estado2 = 'Inactivo';
        }
        else
        {
            $estado = 'Inactivo';
            $estado2 = 'Activo';
        }

        if ($user['Type'] == 2)
        {
            $tipo = 'Escritor';
            $tipo2 = 'Lector';
        }
        else
        {
            $tipo = 'Lector';
            $tipo2 = 'Escritor';
        }      
    }
    else
    {
        header("Status: 301 Moved Permanently");
        header('Location: usuarios.php');
        exit;
    }
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: usuarios.php');
    exit;
}

//Eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar']))
{    
    $_SESSION['mensaje2'] = "";

    $eliminar = $conn -> prepare('UPDATE usuarios SET Estado = :est WHERE ID = :id');
    $eliminar -> execute(array(':est' => '2', ':id' => $datos[1]));
    
    $_SESSION['mensaje2'] = "<script>eliminadouser()</script>";
    header("Status: 301 Moved Permanently");
    header('Location: usuarios.php');                
    exit;
}

if ($_SESSION['usuario']['Type'] == 1 && isset($_SESSION['usuario']))
{
    require 'Views/eliminar_usuario.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>