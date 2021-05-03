<?php

require_once("sessions.php");

//Evangelio
$buscar = $conn -> prepare('SELECT * FROM evangelio WHERE Estado = 1');
$buscar -> execute();
$evangelio = $buscar -> fetchAll();
$TituloEva = $evangelio[0]['Titulo'];
$Eva = nl2br($evangelio[0]['Evangelio']);

require 'Views/evangelio.view.php';

?>