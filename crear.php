<?php

require_once("sessions.php");

$writerBtn = '<li class="nav-item active"><a class="nav-link" href="escritor.php">Escritor</a></li>';

//Crear Articulo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Crear']) && isset($_POST['Titulo']) && isset($_POST['Texto']) && isset($_SESSION['usuario']))
{
    $archivo = $_FILES['Imagen']['name'];
    $_SESSION['mensaje2'] = "";
    
    if (isset($archivo) && $archivo != "")
    {
        $tipo = $_FILES['Imagen']['type'];
        $tamano = $_FILES['Imagen']['size'];
        $temp = $_FILES['Imagen']['tmp_name'];

        if (!((strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) || ($tamano > 524288000)))
        {
            $_SESSION['mensaje2'] = "<script>errormensaje()</script>";
        }
        else
        {
            $titulo = test_input($_POST['Titulo']);
            $texto = test_input($_POST['Texto']);

            if ($titulo == "" || $texto == "")
            {
                $_SESSION['mensaje2'] = "<script>errordatos()</script>";
            }
            else
            {
                $tipo = explode(".", $archivo);
                $imgname = 'noticia-'.$datos[1].'.'.$tipo[1];
                move_uploaded_file($temp, 'Imagenes/'.$imgname);

                $crear = $conn -> prepare('INSERT INTO publicaciones (User_ID, Titulo, Texto, ImgName, Fecha, Estado) VALUES (:user, :tit, :txt, :img, :d, 1)');
                $crear -> execute((array(':user' => $_SESSION['usuario']['ID'], ':tit' => $titulo, ':txt' => $texto, ':img' => $imgname, ':d' => date('Y/m/d'))));
                $_SESSION['mensaje2'] = "<script>creadook()</script>";
                sleep(2);
                header("Status: 301 Moved Permanently");
                header('Location: escritor.php');
                exit;
            }
        }
    }
    else
    {
        $titulo = test_input($_POST['Titulo']);
        $texto = test_input($_POST['Texto']);

        if ($titulo == "" || $texto == "")
        {
            $_SESSION['mensaje2'] = "<script>errordatos()</script>";
        }
        else
        {
            $crear = $conn -> prepare('INSERT INTO publicaciones (User_ID, Titulo, Texto, ImgName, Fecha, Estado) VALUES (:user, :tit, :txt, :img, :d, 1)');
            $crear -> execute((array(':user' => $_SESSION['usuario']['ID'], ':tit' => $titulo, ':txt' => $texto, ':img' => '', 'd' => date('Y/m/d'))));
            $_SESSION['mensaje2'] = "<script>creadook()</script>";
            header("Status: 301 Moved Permanently");
            header('Location: escritor.php');
            exit;
        }
    }
}

if ($_SESSION['usuario']['Type'] == 1 || $_SESSION['usuario']['Type'] == 2)
{
    require 'Views/crear.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>