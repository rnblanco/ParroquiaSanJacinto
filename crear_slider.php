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

//Nuevo Slider
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Crear']))
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
            $num = $conn -> prepare('SELECT COUNT(*) as C FROM slider');
            $num -> execute();
            $num = $num -> fetchAll();
            $num2 = $num[0]['C'];    

            $tipo = explode(".", $archivo);
            $crear = $conn -> prepare('INSERT INTO slider (position, ext) VALUES (:ps, :ty)');
            $crear -> execute(array(':ps' => $num2+1, ':ty' => $tipo[1]));
            
            $id = $conn -> prepare('SELECT ID FROM slider WHERE position = :ps');
            $id -> execute(array(':ps' => $num2+1));
            $id = $id -> fetchAll();
            $id = $id[0]['ID'];
            $imgname = 'sliderimage-'.$id.'.'.$tipo[1];
            move_uploaded_file($temp, 'Imagenes/'.$imgname);

            $_SESSION['mensaje2'] = "<script>creadosliok()</script>";
            sleep(2);
            header("Status: 301 Moved Permanently");
            header('Location: slider.php');
            exit;
        }
    }    
}

if ($_SESSION['usuario']['Type'] == 1 || $_SESSION['usuario']['Type'] == 2)
{
    require 'Views/crear_slider.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>