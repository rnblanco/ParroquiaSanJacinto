<?php

require_once("sessions.php");

if (isset($_SESSION['Verificar']))
{
    $mensaje = $_SESSION['Verificar'];
    unset($_SESSION['Verificar']);
}

//Evangelio
$buscar = $conn -> prepare('SELECT * FROM evangelio WHERE Estado = 1');
$buscar -> execute();
$evangelio = $buscar -> fetchAll();
$TituloEva = $evangelio[0]['Titulo'];
$Eva = nl2br(substr($evangelio[0]['Evangelio'], 0, 1200)."...");

//Slider
$buscar2 = $conn -> prepare('SELECT * FROM slider ORDER BY position');
$buscar2 -> execute();
$slider = $buscar2 -> fetchAll();

foreach ($slider as $slidernum)
{    
    if ($slidernum['position'] == 1)
    {
        $slidernumHTML = '<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>';
        $sliderimgHTML = '<div class="carousel-item active"><div id="home" class="first-section" style="background-image:url(Imagenes/sliderimage-'.$slidernum['ID'].'.'.$slidernum['ext'].');"></div></div>';
    }
    else
    {
        $num = $slidernum['position'] - 1;
        $slidernumHTML .= '<li data-target="#carouselExampleControls" data-slide-to="'.$num.'"></li>';
        $sliderimgHTML .= '<div class="carousel-item"><div id="home" class="first-section" style="background-image:url(Imagenes/sliderimage-'.$slidernum['ID'].'.'.$slidernum['ext'].');"></div></div>';
    }           
}

//Articulos
$buscar3 = $conn -> prepare('SELECT * FROM publicaciones WHERE Estado = 1 ORDER BY ID DESC LIMIT 2');
$buscar3 -> execute();
$noticias = $buscar3 -> fetchAll();

$ID = $noticias[0]["ID"];
$Titulo1 = substr($noticias[0]["Titulo"], 0, 50)."...";
$Cuerpo1 = substr($noticias[0]["Texto"], 0, 280)."...";
if ($noticias[0]["ImgName"] == "")
{
    $Img1 = "imagenes/noticia-default-1.jpg";
}
else
{
    $Img1 = "imagenes/". $noticias[0]["ImgName"];
}

$ID2 = $noticias[1]["ID"];
$Titulo2 = substr($noticias[1]["Titulo"], 0, 50);
$Titulo2 .= "...";
$Cuerpo2 = substr($noticias[1]["Texto"], 0, 300);
$Cuerpo2 .= "...";
if ($noticias[1]["ImgName"] == "")
{
    $Img2 = "imagenes/noticia-default-1.jpg";
}
else
{
    $Img2 = "imagenes/". $noticias[1]["ImgName"];
}

require 'Views/index.view.php';

?>