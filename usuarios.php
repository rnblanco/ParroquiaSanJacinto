<?php

require_once("sessions.php");

$adminBtn = '<li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Administración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="slider.php">Slider</a>
                <a class="dropdown-item" href="editarEva.php">Evangelio del Dia</a>
                <a class="dropdown-item" href="usuarios.php">Usuarios</a>
            </div>
</li>';

//Usuarios
$table = '';

$buscar = $conn -> prepare('SELECT * FROM usuarios WHERE (Estado = 1 OR Estado = 0) AND Type != 1 ORDER BY ID');
$buscar -> execute();
$row = $buscar -> rowCount();

if ($row > 0)
{
    $usuarios = $buscar -> fetchAll();

    $table .= '<br><br><div class="table-responsive"><table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>                        
                        <th scope="col">Email</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Verificado</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </thead>
    <tbody>';

    foreach ($usuarios as $u)
    {
        if ($u['Type'] == 2)
        {
            $tipo = 'Escritor';
        }
        else
        {
            $tipo = 'Lector';
        }

        if ($u['Verificado'] == 1)
        {
            $verif = 'Sí';
        }
        else
        {
            $verif = 'No';
        }

        if ($u['Estado'] == 1)
        {
            $est = 'Activo';
        }
        else
        {
            $est = 'Inactivo';
        }

        $table .= '<tr>
                <th scope="row">'.$u['ID'].'</th>
                <td>'.$u['Nombre'].'</td>                
                <td>'.$u['Email'].'</td>
                <td>'.$tipo.'</td>
                <td>'.$verif.'</td>
                <td>'.$est.'</td>
                <td>
                    <a href="editar_usuario.php?'.$u['ID'].'" class="btn btn-warning">Editar</a>
                    <a href="eliminar_usuario.php?'.$u['ID'].'" class="btn btn-danger">Eliminar</a>
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
                                <h4>No hay ningun usuario para mostrar.</h4>
                            </div>                    
                        </div>
                    </div>
                </div>
            </section>';
}

if ($_SESSION['usuario']['Type'] != 1 || !isset($_SESSION['usuario']))
{
    header("Status: 301 Moved Permanently");
    header('Location: index.php');
    exit;
}
else
{
    require "Views/usuarios.view.php";
}

?>