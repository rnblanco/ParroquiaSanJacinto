<?php

function conectar() 
{
    $host = "localhost";
    $usuario= "root";
    $contraseña = "";
    $dbname = "parroquia";

    try
    {
        $conectarDB = new PDO("mysql:host=$host; dbname=$dbname", $usuario, $contraseña);
        $conectarDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conectarDB->exec("set names utf8");
        return $conectarDB;
    }
    catch(PDOException $error)
    {
        echo "No se pudo conectar a la DB: " . $error->getMessage();
    }
}

?>