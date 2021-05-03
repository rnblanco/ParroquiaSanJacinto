<?php

require_once("sessions.php");

//Articulos
$buscar = $conn -> prepare('SELECT * FROM publicaciones WHERE Estado = 1 ORDER BY ID DESC');
$buscar -> execute();
$noticias = $buscar -> fetchAll();

$noticiasnum = count($noticias);
$noticiasHTML = "";
$img = "";

for ($i = 0; $i <= $noticiasnum; $i += 3)
{
    $noticiasHTML .= '<hr class="hr3">';
    if (isset($noticias[$i]))
    {
        $buscar2 = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :id AND Estado = 1');
        $buscar2 -> execute(array(':id' => $noticias[$i]['ID']));
        $comentarios = $buscar2 -> rowCount();

        $Fecha1 = explode("-", $noticias[$i]['Fecha']);
        if ($noticias[$i]["ImgName"] != "")
        {
            $img = $noticias[$i]["ImgName"];
        }
        else
        {
            $img = "noticia-default-".rand(1, 18).".jpg";
        }
        $noticiasHTML .= '
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-item">
                        <div class="image-blog"><img src="Imagenes/'.$img.'" class="img-fluid" style="height: 140px"></div>
                        <div class="meta-info-blog">
                            <span><i class="fa fa-calendar"></i><a href="#"> '.$Fecha1[2].'-'.$Fecha1[1].'-'.$Fecha1[0].'</a></span>
                            <span><i class="fa fa-tag"></i><a href="#">Articulos</a></span>
                            <span><i class="fa fa-comments"></i><a href="#">'.$comentarios.' Comentarios</a></span></div>
                        <div class="blog-title">
                            <h2><a href="#" title="">'.substr($noticias[$i]["Titulo"], 0, 32).'.</a></h2>
                        </div>
                        <div class="blog-desc">
                            <p>'.substr($noticias[$i]["Texto"], 0, 170).'...</p>
                        </div>
                        <div class="blog-button">
                            <a class="hover-btn-new orange" href="articulo.php?'.$noticias[$i]["ID"].'"><span>Leer Más<span></a>
                        </div>
                    </div>
        </div>';

        if (isset($noticias[$i+1]))
        {
            $buscar3 = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :id AND Estado = 1');
            $buscar3 -> execute(array(':id' => $noticias[$i+1]['ID']));
            $comentarios2 = $buscar3 -> rowCount();

            $Fecha = explode("-", $noticias[$i+1]['Fecha']);
            if ($noticias[$i+1]["ImgName"] != "")
            {
                $img = $noticias[$i+1]["ImgName"];
            }
            else
            {
                $img = "noticia-default-".rand(1, 18).".jpg";
            }
            $noticiasHTML .= '
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="blog-item">
                        <div class="image-blog"><img src="Imagenes/'.$img.'" class="img-fluid" style="height: 140px"></div>
                        <div class="meta-info-blog">
                            <span><i class="fa fa-calendar"></i><a href="#"> '.$Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0].'</a></span>
                            <span><i class="fa fa-tag"></i><a href="#">Articulos</a></span>
                            <span><i class="fa fa-comments"></i><a href="#">'.$comentarios2.' Comentarios</a></span></div>
                        <div class="blog-title">
                            <h2><a href="#" title="">'.substr($noticias[$i+1]["Titulo"], 0, 32).'.</a></h2>
                        </div>
                        <div class="blog-desc">
                            <p>'.substr($noticias[$i+1]["Texto"], 0, 170).'...</p>
                        </div>
                        <div class="blog-button">
                            <a class="hover-btn-new orange" href="articulo.php?'.$noticias[$i+1]["ID"].'"><span>Leer Más<span></a>
                        </div>
                    </div>
            </div>';
            
            if (isset($noticias[$i+2]))
            {
                $buscar4 = $conn -> prepare('SELECT * FROM comentarios WHERE ID_Publi = :id AND Estado = 1');
                $buscar4 -> execute(array(':id' => $noticias[$i+2]['ID']));
                $comentarios3 = $buscar4-> rowCount();

                $Fecha = explode("-", $noticias[$i+2]['Fecha']);
                if ($noticias[$i+2]["ImgName"] != "")
                {
                    $img = $noticias[$i+2]["ImgName"];
                }
                else
                {
                    $img = "noticia-default-".rand(1, 18).".jpg";
                }
                $noticiasHTML .= '
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="blog-item">
                            <div class="image-blog"><img src="Imagenes/'.$img.'" class="img-fluid" style="height: 140px"></div>
                            <div class="meta-info-blog">
                                <span><i class="fa fa-calendar"></i><a href="#"> '.$Fecha[2].'-'.$Fecha[1].'-'.$Fecha[0].'</a></span>
                                <span><i class="fa fa-tag"></i><a href="#">Articulos</a></span>
                                <span><i class="fa fa-comments"></i><a href="#">'.$comentarios3.' Comentarios</a></span></div>
                            <div class="blog-title">
                                <h2><a href="#" title="">'.substr($noticias[$i+2]["Titulo"], 0, 32).'.</a></h2>
                            </div>
                            <div class="blog-desc">
                                <p>'.substr($noticias[$i+2]["Texto"], 0, 170).'...</p>
                            </div>
                            <div class="blog-button">
                                <a class="hover-btn-new orange" href="articulo.php?'.$noticias[$i+2]["ID"].'"><span>Leer Más<span></a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
            else
            {
                $noticiasHTML .= '</div>';
            }
        }
        else
        {
            $noticiasHTML .= '</div>';
        }
    }
}

require 'Views/articulos.view.php';

?>