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

//Datos Evangelio
if (ctype_digit($datos[1]))
{
    $buscar = $conn -> prepare('SELECT * FROM evangelio WHERE ID = :id');
    $buscar -> execute(array(':id' => $datos[1]));
    $row = $buscar -> rowCount();

    if ($row == "1")
    {
        $eva = $buscar -> fetchAll();
        $eva = $eva[0];
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

//Editar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Editar']) && isset($_POST['Titulo']) && isset($_POST['Evangelio']))
{
    
    $titulo = test_input($_POST['Titulo']);
    $texto = test_input($_POST['Evangelio']);

    if ($titulo == "" || $texto == "")
    {
        $_SESSION['mensaje2'] = "<script>errordatos()</script>";
    }
    else
    {

        $editar = $conn -> prepare('UPDATE evangelio SET Titulo = :tit , Evangelio = :txt WHERE ID = :id');
        $editar -> execute(array(':tit' => $titulo, ':txt' => $texto, ':id' => $datos[1]));
        $_SESSION['mensaje2'] = "<script>evaeditok()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: editarEva.php');                
        exit;
    }            
}

if ($_SESSION['usuario']['Type'] == 1)
{
    require 'Views/editarEva.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>