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

//Crear
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Crear']) && isset($_POST['Titulo']) && isset($_POST['Evangelio']) && isset($_POST['Fecha']))
{
    $_SESSION['mensaje2'] = "";

    $titulo = test_input($_POST['Titulo']);
    $texto = test_input($_POST['Evangelio']);

    if ($titulo == "" || $texto == "" || $_POST['Fecha'] < date("Y-m-d"))
    {
        $_SESSION['mensaje2'] = "<script>errordatos()</script>";
    }
    else
    {
        $buscar = $conn -> prepare('SELECT * FROM evangelio WHERE fecha_ini = :f');
        $buscar -> execute(array(':f' => date('Y/m/d', strtotime($_POST['Fecha']))));
        $row = $buscar -> rowCount();        

        if ($row == 1)
        {
            $_SESSION['mensaje2'] = "<script>evaerrorfecha()</script>";
        }
        else
        {
            $crear = $conn -> prepare('INSERT INTO evangelio (Titulo, Evangelio, fecha_ini, Estado) VALUES (:tit, :eva, :f, "0")');
            $crear -> execute(array(':tit' => $titulo, ':eva' => $texto, ':f' => date('Y/m/d', strtotime($_POST['Fecha']))));

            $_SESSION['mensaje2'] = "<script>evaok()</script>";
            header("Status: 301 Moved Permanently");
            header('Location: evangelios.php');                
            exit;
        }        
    }            
}

if ($_SESSION['usuario']['Type'] == 1)
{
    require 'Views/crearEva.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>