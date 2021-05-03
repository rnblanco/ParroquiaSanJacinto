<?php session_start();

include("conexion.php");

$conn = conectar();

$url = $_SERVER["REQUEST_URI"];

$datos = explode("?", $url);

$buscar = $conn -> prepare('SELECT * FROM usuarios WHERE ID = :ID AND SeedEmail = :SE AND Verificado = 1');
$buscar -> execute(array(':ID' => $datos[1], ':SE' => $datos[2]));
$row = $buscar -> rowCount();

if ($row == "1")
{
    $_SESSION['Verificar'] = "<script>alreadyverif()</script>";    
}
else
{
    $buscar2 = $conn -> prepare('UPDATE usuarios SET Verificado = 1 WHERE ID = :ID AND SeedEmail = :SE');
    $buscar2 -> execute(array(':ID' => $datos[1], ':SE' => $datos[2]));
    $row2 = $buscar2 -> rowCount();
    if ($row2 == "1")
    {
        $_SESSION['Verificar'] = "<script>verifsuccess()</script>";     
    }
    else
    {
        $_SESSION['Verificar'] = "<script>veriferror()</script>";        
    }
}

header("Status: 301 Moved Permanently");
header('Location: index.php');
exit;

?>