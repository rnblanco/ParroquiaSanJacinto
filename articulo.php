<?php

require_once("sessions.php");

$url = $_SERVER["REQUEST_URI"];

$datos = explode("?", $url);

if (isset($_POST['msj']))
{
    $mensaje2 = $_POST['msj'];
    unset($_POST['msj']);
}

//Articulo
if (ctype_digit($datos[1]))
{
    $buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE ID = :id AND Estado = 1 ORDER BY ID DESC');
    $buscar -> execute(array(':id' => $datos[1]));
    $row = $buscar -> rowCount();

    if ($row == "1")
    {
        $articulo = $buscar -> fetchAll();
        $articulo = $articulo[0];
        $Fecha = explode("-", $articulo['Fecha']);
        $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];

        $buscar2 = $conn -> prepare('SELECT Nombre FROM usuarios WHERE ID = :id');
        $buscar2 -> execute(array(':id' => $articulo['User_ID']));
        $user = $buscar2 -> fetchAll();
        $user = $user[0]['Nombre'];
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

//Comentarios
$buscar2 = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :id AND Estado = 1 ORDER BY ID ASC');
$buscar2 -> execute(array(':id' => $datos[1]));
$Comentarios = $buscar2 -> fetchAll();
$row = $buscar2 -> rowCount();
$comentariosHTML = '';

if ($row > 0)
{
    foreach ($Comentarios as $cm)
    {
        $buscar3 = $conn -> prepare('SELECT Nombre FROM usuarios WHERE ID = :id ');
        $buscar3 -> execute(array(':id' => $cm['ID_User']));
        $UserCom = $buscar3 -> fetch();
        $FechaCom = explode("-", $cm['Fecha']);
        $FechaCom = $FechaCom[2].'-'.$FechaCom[1].'-'.$FechaCom[0];

        $buscar4 = $conn -> prepare('SELECT * FROM respuestas WHERE ID_Comentario = :id AND Estado = 1 ');
        $buscar4 -> execute(array(':id' => $cm['ID']));
        $Respuestas = $buscar4 -> fetchAll();
        $row2 = $buscar4 -> rowCount();

        $comentariosHTML .= '<li class="comment" style="list-style:none"><div class="comment-container"><h5 class="comment-author"><a href="">'.$UserCom[0].'</a></h5>';

        if (isset($_SESSION['usuario']))
        {
            $comentariosHTML .= '<div class="comment-meta">
                                    <h6><a class="comment-date link-style1">'.$FechaCom.' - Respuestas ('.$row2.')</a></h6>
                                    <a class="comment-reply-link link-style3" onclick="respuesta('.$cm['ID'].')">Responder »</a>
                                </div>
                                <div class="comment-body">
                                        <p>'.$cm["Comentario"].'</p>
                                    </div>
                                </div>
                            </li>';
        }
        else
        {
            $comentariosHTML .= '<div class="comment-meta">
                                    <h6><a class="comment-date link-style1">'.$FechaCom.' - Respuestas ('.$row2.')</a></h6>
                                </div>
                                <div class="comment-body">
                                    <p>'.$cm["Comentario"].'</p>
                                </div>
                            </div>
                        </li>';
        }
        
        if ($row2 > 0)
        {
            $comentariosHTML .= '<ul class="children">';

            foreach ($Respuestas as $rt)
            {
                $buscar5 = $conn -> prepare('SELECT Nombre FROM usuarios WHERE ID = :id');
                $buscar5 -> execute(array(':id' => $rt['ID_Usuario']));
                $UserRt = $buscar5 -> fetch();
                $FechaRt = explode("-", $rt['Fecha']);
                $FechaRt = $FechaRt[2].'-'.$FechaRt[1].'-'.$FechaRt[0];

                $comentariosHTML .= '<li class="comment">                   
                                            <div class="comment-container">
                                                <h5 class="comment-author"><a>'.$UserRt[0].'</a></h5>
                                                <div class="comment-meta">
                                                    <h6><a class="comment-date link-style1">'.$FechaRt.'</a></h6>
                                                </div>
                                                <div class="comment-body">
                                                    <p> '.$rt["Respuesta"].' </p>
                                                </div>
                                            </div>
                </li>';
            }

            $comentariosHTML .= '</ul>';
        }
    }
}
else
{
    $comentariosHTML .= '<li class="comment" style="list-style:none"><div class="comment-container"></div></li>';
}

//Comentar
$mensaje2 = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Comentar']) && isset($_POST['Comentario']) && isset($_SESSION['usuario']))
{
    $Comentario = test_input($_POST['Comentario']);

    if ($Comentario == "" || strlen($Comentario) > 150)
    {
        $mensaje2 = "<script>errorcomentario()</script>";        
    }
    else
    {
        $comentar = $conn -> prepare('INSERT INTO comentarios (ID_User, ID_Publi, Comentario, Fecha, Estado) VALUES (:IdUsuario, :IdPublicacion, :Comentario, :Fecha, :Estado)');
        $comentar -> execute(array(':IdUsuario' => $_SESSION['usuario']['ID'],':IdPublicacion' => $datos[1], ':Comentario' => $Comentario, ':Fecha' => date('Y/m/d'), 'Estado' => 1));
        $mensaje = "<script>comentario()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: articulo.php?'.$datos[1]);
        exit;
    }
}

if (isset($_SESSION['usuario']))
{
    $comenHTML = '<div class="comments-form text-center">
                    <h4 class="text-left">- Deja un comentario -</h4>
                    <div class="comment-form-main">
                        <form method="POST">
                            <div class="row">									
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="Comentario" placeholder="Comentario" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 post-btn">
                                    <button name="Comentar" class="hover-btn-new orange" type="submit"><span>Comentar</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>';
}
else
{
    $comenHTML = '<div class="comments-form text-center">
                <h4 class="text-left">- Debes Iniciar Sesión para Comentar -</h4>
                </div>';
}

//Responder
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ComID']) && isset($_POST['Respuesta']) && isset($_POST['Respuestabtn']) && isset($_SESSION['usuario']))
{
    $respuesta = test_input($_POST['Respuesta']);
    $ComID = test_input($_POST['ComID']);

    if ($respuesta == "" || strlen($respuesta) > 150)
    {
        $mensaje2 = "<script>errorrespuesta()</script>";
    }
    else
    {
        if (!ctype_digit($ComID))
        {
            header("Status: 301 Moved Permanently");
            header('Location: articulo.php?'.$datos[1]);
            exit;
        }

        $responder =  $conn -> prepare('INSERT INTO respuestas (ID_Usuario, ID_Comentario, Respuesta, Fecha, Estado) VALUES (:IdUsuario, :IdPublicacion, :Comentario, :Fecha, :Estado)');
        $responder -> execute(array(':IdUsuario' => $_SESSION['usuario']['ID'],':IdPublicacion' => $ComID, ':Comentario' => $respuesta, ':Fecha' => date('Y/m/d'), 'Estado' => 1));
        $_POST['msj'] = "<script>respuestaok()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: articulo.php?'.$datos[1]);
        exit;
    }    
}

require 'Views/articulo.view.php';

?>