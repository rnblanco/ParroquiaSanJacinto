<?php

require_once("sessions.php");

$writerBtn = '<li class="nav-item active"><a class="nav-link" href="escritor.php">Escritor</a></li>';

if ($_SESSION['usuario']['Type'] != 1 && $_SESSION['usuario']['Type'] != 2 || !isset($_SESSION['usuario']))
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

//publicaciones
if ($_SESSION['usuario']['Type'] == 1)
{
    $buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE Estado = 1 OR Estado = 0 ORDER BY ID DESC');
    $buscar -> execute();
    $row = $buscar -> rowCount();
}
else
{
    $buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE User_ID = :id AND (Estado = 1 OR Estado = 0) ORDER BY ID DESC');
    $buscar -> execute(array(':id' => $_SESSION['usuario']['ID']));
    $row = $buscar -> rowCount();
}

$table = '';

if ($row > 0)
{
    $publicaciones = $buscar -> fetchAll();
    $publiNum = count($publicaciones);
    $adminTb = '';

    if ($_SESSION['usuario']['Type'] == 1)
    {
        $adminTb = '<th scope="col">User_ID</th>';
    }

    $table .= '<br><br><div class="table-responsive"><table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        '.$adminTb.'
                        <th scope="col">Titulo</th>                        
                        <th scope="col">Texto</th>
                        <th scope="col">Comentarios</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </thead>
                    <tbody>';

    foreach ($publicaciones as $pb)
    {
        $ID = $pb['ID'];
        $titulo = substr($pb['Titulo'], 0, 50).'...';
        $texto = substr($pb['Texto'], 0, 60).'...';
        $Fecha = explode("-", $pb['Fecha']);
        $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];
        $adminTb2 = '';

        $buscar2 = $conn -> prepare('SELECT * FROM comentarios WHERE Estado = 1 AND ID_Publi = :id');
        $buscar2 -> execute(array(':id' => $ID));
        $row = $buscar2 -> rowCount();

        if ($_SESSION['usuario']['Type'] == 1)
        {
            $adminTb2 = '<td>'.$pb['User_ID'].'</td>'; 
        }
        if ($pb['ImgName'] == "")
        {
            $img = "-";
        }
        else
        {
            $img = $pb['ImgName'];
        }

        if ($pb['Estado'] == 1)
        {
            $estado = "Activa";
        }
        else
        {
            $estado = "Inactiva";
        }

        $table .= '<tr>
                <th scope="row">'.$ID.'</th>
                '.$adminTb2.'
                <td>'.$titulo.'</td>                
                <td>'.$texto.'</td>
                <td>'.$row.'</td>
                <td>'.$img.'</td>
                <td>'.$Fecha.'</td>
                <td>'.$estado.'</td>
                <td>
                    <a href="editar.php?'.$ID.'" class="btn btn-warning">Editar</a>
                    <a href="eliminar.php?'.$ID.'" class="btn btn-danger">Eliminar</a>
                    <a href="comentarios.php?'.$ID.'" class="btn btn-success">Ver Comentarios</a>
                </td>
        </tr>';       
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
                                    <h4>No tienes ningun Artículo.</h4>
                                </div>                    
                            </div>
                        </div>
                    </div>
                </section>';
}

require "Views/escritor.view.php";

?>