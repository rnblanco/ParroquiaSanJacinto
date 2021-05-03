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

//Editar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Editar']) && isset($_POST['Titulo']) && isset($_POST['Texto']) && isset($_POST['Estado']) && isset($_SESSION['usuario']))
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
            $_SESSION['mensaje2'] = "<script>errorimagen()</script>";
        }
        else
        {
            $titulo = test_input($_POST['Titulo']);
            $texto = test_input($_POST['Texto']);
            $est = test_input($_POST['Estado']);

            if ($titulo == "" || $texto == "" || $est == "" || $est != "Activo" && $est != "Inactivo")
            {
                $_SESSION['mensaje2'] = "<script>errordatos()</script>";
            }
            else
            {
                unlink('Imagenes/'.$articulo['ImgName']);

                $tipo = explode(".", $archivo);
                $imgname = 'noticia-'.$datos[1].'.'.$tipo[1];
                move_uploaded_file($temp, 'Imagenes/'.$imgname);

                if ($est == 'Activo')
                {
                    $est = '1';            
                }
                else
                {
                    $est = '0';
                }

                $editar = $conn -> prepare('UPDATE publicaciones SET Titulo = :tit , Texto = :txt, ImgName = :img, Estado = :est WHERE ID = :id');
                $editar -> execute(array(':tit' => $titulo, ':txt' => $texto, ':img' => $imgname, ':est' => $est, 'id' => $datos[1]));
                $_SESSION['mensaje2'] = "<script>editadook()</script>";
                sleep(2);
                header("Status: 301 Moved Permanently");
                header('Location: editar.php?'.$datos[1]);                
                exit;
            }            
        }
    }
    else
    {
        $titulo = test_input($_POST['Titulo']);
        $texto = test_input($_POST['Texto']);
        $est = test_input($_POST['Estado']);

        if ($titulo == "" || $texto == "" || $est == "" || $est != "Activo" && $est != "Inactivo")
        {
            $_SESSION['mensaje2'] = "<script>errordatos()</script>";
        }
        else
        {
            if ($est == 'Activo')
            {
                $est = '1';            
            }
            else
            {
                $est = '0';
            }

            $editar = $conn -> prepare('UPDATE publicaciones SET Titulo = :tit , Texto = :txt, Estado = :est WHERE ID = :id');
            $editar -> execute((array(':tit' => $titulo, ':txt' => $texto, ':est' => $est, 'id' => $datos[1])));
            $_SESSION['mensaje2'] = "<script>editadook()</script>";
            header("Status: 301 Moved Permanently");
            header('Location: editar.php?'.$datos[1]);                
            exit;
        }
    }
}

if ($_SESSION['usuario']['Type'] == 1 || $_SESSION['usuario']['Type'] == 2)
{
    require 'Views/editar.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>