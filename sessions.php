<?php

include("conexion.php");
include("Mail/enviar.php");

ini_set("session.cookie_lifetime", "0");
session_set_cookie_params(0);
session_start();
$conn = conectar();

//Registro
$error = null;
$Name = null;
$Email = null;
$Password = null;
$PasswordC = null;
$mensaje = null;
$host  = $_SERVER['HTTP_HOST'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Registry']) && isset($_POST['RName']) && isset($_POST['REmail']) && isset($_POST['RPassword']) && !isset($_SESSION['usuario']))
{
    $Name = test_input($_POST['RName']);
    $Email = test_input($_POST['REmail']);
    $Password = test_input($_POST['RPassword']);
    $PasswordC = test_input($_POST['RPassword2']);    

    if ($Name == "" || strlen($Name) > 150)
    {
        $error .= "Nombre|";
    }
    if ($Email == "" || strlen($Email) > 150)
    {
        $error .= "Email|";
    }
    if ($Password == "" || strlen($Password) > 100)
    {
        $error .= "Contraseña|";
    }
    if ($PasswordC == "" || strlen($PasswordC) > 100)
    {
        $error .= "Contraseña|";
    }
    if (isset($error))
    {
        $mensaje = "<script>errormsj('".$error."')</script>";
    }
    else
    {
        if ($Password != $PasswordC)
        {
            $mensaje = "<script>errorcontraseña()</script>";
        }
        else
        {
            if (filter_var($Email, FILTER_VALIDATE_EMAIL))
            {
                $buscar4 = $conn -> prepare('SELECT * FROM usuarios WHERE Email = :Email AND Estado = 1');
                $buscar4 -> execute(array(':Email' => $Email));
                $row = $buscar4 -> rowCount();

                if ($row == "1")
                {
                    $mensaje = "<script>erroremail2()</script>";            
                }
                else
                {
                    $seed = md5(uniqid(rand(), true));
                    $hash = hash('sha512', $seed.$Password);
                    unset($Password);
                    $SeedEmail = random_string(300);
                    $insertar = $conn -> prepare('INSERT INTO usuarios (Nombre, Email, Password, Seed, Type, Verificado, SeedEmail, Estado) VALUES (:Nombre, :Email, :Pass, :Seed, "3", "0", :SeedEmail, "1")');
                    $insertar -> execute(array(':Nombre' => $Name,':Email' => $Email, ':Pass' => $hash, ':Seed' => $seed, ':SeedEmail' => $SeedEmail));
                    $buscar5 = $conn -> prepare('SELECT ID FROM usuarios WHERE Email = :Email AND SeedEmail = :SeedEmail');
                    $buscar5 -> execute(array(':Email' => $Email, ':SeedEmail' => $SeedEmail));
                    $usuario = $buscar5 -> fetchAll();
                    $url = "https://".$host."/".'verificar.php?'.$usuario[0]["ID"].'?'.$SeedEmail;            
                    EnviarEmail($Name, $Email, $url);
                    $mensaje = $_SESSION['msj'];                                   
                    header("Status: 301 Moved Permanently");
                    header('Location: '.$_SERVER["PHP_SELF"]);
                    exit;
                }
            }
            else
            {
                $mensaje = "<script>erroremail()</script>";
            }
        }        
    }      
}

//Logueo
$error2 = null;
$Email2 = null;
$Password2 = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Login']) && isset($_POST['LEmail']) && isset($_POST['LPassword']) && !isset($_SESSION['usuario']))
{
    $Email2 = test_input($_POST['LEmail']);
    $Password2 = test_input($_POST['LPassword']);

    if ($Email2 == "" || strlen($Email2) > 150)
    {
        $error2 .= " Email |";
    }
    if ($Password2 == "" || strlen($Password2) > 100)
    {
        $error2 .= " Contraseña |";
    }
    if (isset($error2))
    {
        $mensaje = "<script>errormsj('".$error2."')</script>";
    }
    else
    {
        if (filter_var($Email2, FILTER_VALIDATE_EMAIL))
        {
            $buscar6 = $conn -> prepare('SELECT * FROM usuarios WHERE Email = :Email AND Verificado = 1 AND Estado = 1');
            $buscar6 -> execute(array(':Email' => $Email2));            
            $row2 = $buscar6 -> rowCount();

            if ($row2 == "1")
            {
                $datos = $buscar6 -> fetchAll();
                $datos = $datos[0];
                $Password2 =  hash('sha512', $datos['Seed'].$Password2);
                if ($Password2 === $datos['Password'])
                {
                    $mensaje = "<script>logueado('".$datos['Nombre']."')</script>";
                    $_SESSION['usuario'] = $datos;                 
                }                
                else
                {
                    $mensaje = "<script>errorcuenta()</script>";                
                }
            }
            else
            {
                $buscar7 = $conn -> prepare('SELECT * FROM usuarios WHERE Email = :Email AND Verificado = 1 AND Estado = 0');
                $buscar7 -> execute(array(':Email' => $Email2));            
                $row3 = $buscar7 -> rowCount();

                if ($row3 == "1")
                {
                    $mensaje = "<script>cuentainactiva()</script>";                
                }     
                else
                {
                    $buscar8 = $conn -> prepare('SELECT * FROM usuarios WHERE Email = :Email AND Verificado = 0 AND Estado = 1');
                    $buscar8 -> execute(array(':Email' => $Email2));            
                    $row4 = $buscar8 -> rowCount();

                    if ($row4 == "1")
                    {
                        $mensaje = "<script>cuentanoverif()</script>";                
                    }     
                    else
                    {
                        $mensaje = "<script>errorcuenta()</script>";                
                    }             
                }           
            }
        }
        else
        {
            $mensaje = "<script>erroremail()</script>";
        }
    }
    unset($Email2, $Password2, $row2, $datos, $_POST);
}    

//Cerrar Sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Logout']))
{
    unset($_SESSION['usuario']);
}

//Validaciones de Sesion
if (isset($_SESSION['usuario']))
{
    $Sbutton = 'Cerrar Sesión';
    $Sactive = 'data-target="#logout"';

    if ($_SESSION['usuario']['Type'] == 1)
    {
        $adminBtn = '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="dropdown-a" data-toggle="dropdown">Administración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                <a class="dropdown-item" href="slider.php">Slider</a>
                <a class="dropdown-item" href="evangelios.php">Evangelio del Dia</a>
                <a class="dropdown-item" href="usuarios.php">Usuarios</a>
            </div>
        </li>';
        $writerBtn = '<li class="nav-item"><a class="nav-link" href="escritor.php">Escritor</a></li>';
    }
    else
    {
        $adminBtn = '';

        if ($_SESSION['usuario']['Type'] == 2)
        {
            $writerBtn = '<li class="nav-item"><a class="nav-link" href="escritor.php">Escritor</a></li>';
        }
        else
        {
            $writerBtn ='';
        }
    }

    
}
else 
{
    $Sbutton = 'Iniciar Sesión';
    $Sactive = 'data-target="#login"';
    $adminBtn = '';
    $writerBtn ='';
}

//Verificación de evangelio
$evaC = $conn -> prepare('SELECT * FROM evangelio ORDER BY fecha_ini LIMIT 2');
$evaC -> execute();
$row = $evaC -> rowCount();
$evaC = $evaC -> fetchAll();

date_default_timezone_set('America/El_Salvador');
$actualdate = date("Y-m-d");

if($row == 2)
{
    if ($evaC[0]['fecha_ini'] < $actualdate && $actualdate >= $evaC[1]['fecha_ini'])
    {        
        $DeleteEva = $conn -> prepare('DELETE FROM evangelio WHERE ID = :id');
        $DeleteEva -> execute(array(':id' => $evaC[0]['ID']));

        $UpdateEva = $conn -> prepare('UPDATE evangelio SET Estado = 1 WHERE ID = :id');
        $UpdateEva -> execute(array(':id' => $evaC[1]['ID']));
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function random_string(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

?>