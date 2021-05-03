<?php

require_once("sessions.php");

$url = $_SERVER["REQUEST_URI"];

$datos = explode("?", $url);

$writerBtn = '<li class="nav-item active"><a class="nav-link" href="escritor.php">Escritor</a></li>';

if ($_SESSION['usuario']['Type'] != 1 && $_SESSION['usuario']['Type'] != 2 || !isset($_SESSION['usuario']))
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

//comentarios y respuestas
$table = '';

if (ctype_digit($datos[1]))
{
    if ($_SESSION['usuario']['Type'] == 1)
    {
        $buscar = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :idp AND Estado = 1 ORDER BY ID');
        $buscar -> execute(array(':idp' => $datos[1]));
        $row2 = -1;
    }
    else
    {
        $buscar = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :idp AND Estado = 1 ORDER BY ID');
        $buscar -> execute(array('idp' => $datos[1]));
        $buscar2 = $conn -> prepare('SELECT * FROM publicaciones WHERE ID = :id AND User_ID = :user AND (Estado = 1 OR Estado = 0) ORDER BY ID DESC');
        $buscar2 -> execute(array(':id' => $datos[1], ':user' => $_SESSION['usuario']['ID']));
        $row2 = $buscar2 -> rowCount();
    }
    
    $row = $buscar -> rowCount();

    if ($row > 0 && $row2 == 1 || $row > 0 && $row2 == -1)
    {
        $comentarios = $buscar -> fetchAll();
        
        $table .= '<br><br><div class="table-responsive"><table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ID_User</th>                        
                        <th scope="col">Comentario</th>
                        <th scope="col">Respuestas</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </thead>
                    <tbody>';
        
        foreach ($comentarios as $cm)
        {
            $ID = $cm['ID'];
            $user = $cm['ID_User'];
            $comentario = $cm['Comentario'];
            $Fecha = explode("-", $cm['Fecha']);
            $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];

            $buscar2 = $conn -> prepare('SELECT * FROM respuestas WHERE ID_Comentario = :id AND Estado = 1');
            $buscar2 -> execute(array(':id' => $ID));
            $respuestas = $buscar2 -> fetchAll();            

            $table .= '<tr>
                    <th scope="row">'.$ID.'</th>                    
                    <td>'.$user.'</td>                
                    <td>'.$comentario.'</td>
                    <td>-</td>
                    <td>'.$Fecha.'</td>
                    <td>
                        <a onclick="eliminarcm('.$ID.')" class="btn btn-danger text-white">Eliminar Comentario</a>
                    </td>
            </tr>';
            
            foreach ($respuestas as $r)
            {
                $Fecha = explode("-", $r['Fecha']);
                $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];
                
                $table .= '<tr>
                        <th scope="row">'.$r['ID'].'</td>
                        <td>'.$r['ID_Usuario'].'</td>
                        <td></td>
                        <td>'.$r['Respuesta'].'</td>
                        <td>'.$Fecha.'</td>
                        <td>
                            <a onclick="eliminarR('.$r['ID'].')" class="btn btn-danger text-white">Eliminar Respuesta</a>
                        </td>
                </tr>';
            }
        }

        $table .= '</tbody></table></div><br><br>';
    }
    else
    {
        $table .= '<section class="section lb page-section">
                    <div class="container">
                        <div class="section-title row text-center">
                            <div class="col-md-8 offset-md-2">
                                <div class="message-box">
                                    <h4>No hay ningun comentario para este Artículo.</h4>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </section>';
    }
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

//Eliminar Comentario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EliminarCom']) && isset($_POST['ComID']))
{
    $ComID = $_POST['ComID'];
    $eliminarcm = $conn -> prepare('SELECT * FROM comentarios WHERE ID = :id');
    $eliminarcm -> execute(array(':id' => $ComID));
    $eliminarcm = $eliminarcm -> fetchAll();

    if ($eliminarcm[0]['ID_Publi'] == $datos[1])
    {
        $eliminarcm = $conn -> prepare('UPDATE comentarios SET Estado = 0 WHERE ID = :id');
        $eliminarcm -> execute(array(':id' => $ComID));
        $eliminarR = $conn -> prepare('UPDATE respuestas SET Estado = 0 WHERE ID_Comentario = :id');
        $eliminarR -> execute(array(':id' => $ComID));
        $_SESSION['mensaje2'] = "<script>CmEliminado()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: comentarios.php?'.$datos[1]);
        exit;
    }
}

//Eliminar Respuesta
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EliminarR']) && isset($_POST['ResID']))
{
    $ResID = $_POST['ResID'];
    $eliminarR = $conn -> prepare('SELECT * FROM respuestas WHERE ID = :id');
    $eliminarR -> execute(array(':id' => $ResID));
    $eliminarR = $eliminarR -> fetchAll();

    $eliminarR2 = $conn -> prepare('SELECT * FROM comentarios WHERE ID = :id');
    $eliminarR2 -> execute(array(':id' => $eliminarR[0]['ID_Comentario']));
    $eliminarR2 = $eliminarR2 -> fetchAll();

    if ($eliminarR2[0]['ID_Publi'] == $datos[1])
    {
        $eliminarR = $conn -> prepare('UPDATE respuestas SET Estado = 0 WHERE ID = :id');
        $eliminarR -> execute(array(':id' => $ResID));
        $_SESSION['mensaje2'] = "<script>REliminado()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: comentarios.php?'.$datos[1]);
        exit;
    }
}

require "Views/comentarios.view.php";

?>