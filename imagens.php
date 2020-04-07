<?php
include "wideimage/lib/WideImage.php";

$img = WideImage::loadFromFile('img/Nova_LOGO_ Dcperfumes_160x160.p.jpg');
//$img = WideImage::loadFromFile($_FILES['f_file']['tmp_name']);
//Define o tipo de cabeçalho para exibir a imagens
header("Content-type: img/jpeg");
//enviar a imagem para o navegador

$img->asString('jpg', 80);

echo "<img src='{$img}'>";
var_dump($img);
