<?php

require_once("sessions.php");

$adminBtn = '<li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Administración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="slider.php">Slider</a>
                <a class="dropdown-item" href="Evangelios.php">Evangelio del Dia</a>
                <a class="dropdown-item" href="usuarios.php">Usuarios</a>
            </div>
</li>';

//Slider
$table = '';

$buscar = $conn -> prepare('SELECT * FROM slider ORDER BY position');
$buscar -> execute();
$row = $buscar -> rowCount();

if ($row > 0)
{
    $slider = $buscar -> fetchAll();

    $table .= '<br><br><div class="table-responsive"><table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">Posición</th>
                        <th scope="col" class="text-center">ID</th>                        
                        <th scope="col" class="text-center">Imagen</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </thead>
    <tbody>';

    foreach ($slider as $s)
    {        
        $buscar2 = $conn -> prepare('SELECT * FROM slider WHERE position <> :id ORDER BY position');
        $buscar2 -> execute(array(':id' => $s['position']));
        $pos = $buscar2 -> fetchAll();

        $options = '';
        $options .= '<select class="custom-select" name="Slider'.$s['position'].'"><option value="'.$s['position'].'">'.$s['position'].'</option>';

        foreach ($pos as $b)
        {
            $options .= '<option value="'.$b['position'].'">'.$b['position'].'</option>';
        }

        $options .= '</select>';

        $table .= '<tr>
                <th class="text-center" scope="row">'.$options.'</th>
                <td class="text-center">'.$s['ID'].'</td>                
                <td class="text-center"><img src="Imagenes/sliderimage-'.$s['ID'].'.'.$s['ext'].'" class="img-fluid" style="height: 90px; width: 205px"></td>
                <td class="text-center">                    
                    <a onclick="eliminarS('.$s['ID'].')" class="btn btn-danger text-white">Eliminar</a>
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
                                <h4>No hay ningun slider para mostrar.</h4>
                            </div>                    
                        </div>
                    </div>
                </div>
            </section>';
}

//Editar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Editar']))
{
    $datos = $conn -> prepare('SELECT * FROM slider');    
    $datos -> execute();
    $datos = $datos -> fetchAll();

    $datos2 = $conn -> prepare('SELECT COUNT(*) AS C FROM slider');
    $datos2 -> execute();
    $datos2 = $datos2 -> fetchAll();

    $slider = array();

    for ($i = 1; $i <= $datos2[0]['C']; $i++)
    {
        array_push($slider, $_POST['Slider'.$i]);
    }

    if(count(array_unique($slider)) == $datos2[0]['C'])
    {
        foreach ($datos as $d)
        {
            $id = $d['ID'];
            $ps = $_POST['Slider'.$d['position']];
            
            $update = $conn -> prepare('UPDATE slider SET position = :ps WHERE ID = :id');
            $update -> execute(array(':ps' => $ps, ':id' => $id));
        }

        $_SESSION['mensaje2'] = "<script>sliderok()</script>";
        header("Status: 301 Moved Permanently");
        header('Location: slider.php');                
        exit;
    }
    else
    {
        $_SESSION['mensaje2'] = "<script>slidererror()</script>";
    }    
}

//Eliminar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Eliminar']) && isset($_POST['SID']))
{
    $_SESSION['mensaje2'] = "";
    $id = test_input($_POST['SID']);

    $datos = $conn -> prepare('SELECT * FROM slider WHERE ID = :id');
    $datos -> execute(array('id' => $id));
    $datos = $datos -> fetchAll();

    $datos2 = $conn -> prepare('SELECT * FROM slider WHERE position >= :ps');
    $datos2 -> execute(array(':ps' => $datos[0]['position']));
    $datos2 = $datos2 -> fetchAll();

    foreach ($datos2 as $d)
    {
        $update = $conn -> prepare('UPDATE slider SET position = :ps WHERE ID = :id');
        $update -> execute(array(':ps' => $d['position']-1, ':id' => $d['ID']));
    }

    $eliminar = $conn -> prepare('DELETE FROM slider WHERE ID = :id');
    $eliminar -> execute((array('id' => $id)));
    unlink('Imagenes/sliderimage-'.$id.'.'.$datos[0]['ext']);
    $_SESSION['mensaje2'] = "<script>eliminadoSok()</script>";
    header("Status: 301 Moved Permanently");
    header('Location: slider.php');                
    exit;
}

if ($_SESSION['usuario']['Type'] == 1 && isset($_SESSION['usuario']))
{
    require 'Views/slider.view.php';
}
else
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}

?>