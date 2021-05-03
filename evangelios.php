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

//Evangelios
$table = '';

$buscar = $conn -> prepare('SELECT * FROM evangelio ORDER BY fecha_ini');
$buscar -> execute();
$row = $buscar -> rowCount();

$table .= '<br><br><div class="table-responsive"><table class="table table-striped table-hover">
                    <thead>
                        <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>                        
                        <th scope="col">Evangelio</th>
                        <th scope="col">Fecha Programada</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </thead>
    <tbody>';

$evangelios = $buscar -> fetchAll();    

if ($row == 1)
{    
    foreach ($evangelios as $e)
    {
        $Eva = nl2br(substr($e['Evangelio'], 0, 100)."...");
        $Fecha = explode("-", $e['fecha_ini']);
        $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];

        $table .= '<tr class="text-center">
                <th scope="row">'.$e['ID'].'</th>
                <td>'.$e['Titulo'].'</td>                
                <td>'.$Eva.'</td>
                <td>'.$Fecha.'</td>
                <td>Activo</td>
                <td>
                    <a href="editarEva.php?'.$e['ID'].'" class="btn btn-warning">Editar</a>
                </td>
        </tr>'; 
    }    
}
else if ($row > 1)
{
    foreach ($evangelios as $e)
    {
        if ($e['Estado'] == 1)
        {
            $est = 'Activo';
        }
        else
        {
            $est = 'En Espera';
        }

        $Eva = nl2br(substr($e['Evangelio'], 0, 100)."...");
        $Fecha = explode("-", $e['fecha_ini']);
        $Fecha = $Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0];

        $table .= '<tr class="text-center">
                <th scope="row">'.$e['ID'].'</th>
                <td>'.$e['Titulo'].'</td>                
                <td>'.$Eva.'</td>
                <td>'.$Fecha.'</td>
                <td>'.$est.'</td>
                <td>
                    <a href="editarEva.php?'.$e['ID'].'" class="btn btn-warning">Editar</a>
                    <a onclick="eliminarEva('.$e['ID'].')" class="btn btn-danger text-white">Eliminar</a>
                </td>
        </tr>'; 
    }
}

$table .= '</tbody></table></div><br><br>';

//Eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar']) && isset($_POST['EID']))
{    
    $ID = $_POST['EID'];
    $eliminar = $conn -> prepare('DELETE FROM evangelio WHERE ID = :id');
    $eliminar -> execute(array(':id' => $ID));

    header("Status: 301 Moved Permanently");
    header('Location: evangelios.php');
    exit;
}

if ($_SESSION['usuario']['Type'] != 1 || !isset($_SESSION['usuario']))
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}
else
{
    require "Views/evangelios.view.php";
}

?>