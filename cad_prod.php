<?php
require_once "wideimage/lib/WideImage.php";
if (isset($_POST['f_btn'])) {
    $cod = filter_var($_POST['f_cod'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['f_nome'], FILTER_SANITIZE_STRING);
    $ml = filter_var($_POST['f_ml'], FILTER_SANITIZE_STRING);
    $marcas = filter_var($_POST['f_marcas'], FILTER_SANITIZE_STRING);
    $sexo = filter_var($_POST['f_sexo'], FILTER_SANITIZE_STRING);
    $classi = filter_var($_POST['f_classi'], FILTER_SANITIZE_STRING);
    $valorCatalogo = filter_var($_POST['f_valorCatalogo'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $valorVenda = filter_var($_POST['f_valorVenda'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $valorCompra = filter_var($_POST['f_valorCompra'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $fileImg = isset($_FILES['f_file']) ? $_FILES['f_file'] : "";
    $imgem = file_get_contents('img/Nova_LOGO_ Dcperfumes_160x160.p.jpg');
    $b64 = base64_encode($imgem);
    echo $b64;

    echo " <br>cod:" . $cod . "<br>";
    echo "Nome: " . $nome . "<br>";
    echo "Ml:" . $ml . "<br>";
    echo "Marcas:" . $sexo . "<br>";
    echo "sexo:" . $marcas . "<br>";
    echo "classi:" . $classi . "<br>";

    echo $valorCatalogo . "<br>";
    echo $valorVenda . "<br>";
    echo $valorCompra . "<br>";

    var_dump($fileImg);
    $exte = ['.jpg', '.gif', '.png'];

    $extesao = strtolower(substr($fileImg["name"], -4));
    echo $extesao;
    $file = $_FILES['f_file']['name'];
    $png = pathinfo($file, PATHINFO_EXTENSION);

    echo "<br>" . $png . "<br>";
    if ($fileImg['name'] !== "") {

        if (in_array($extesao, $exte)) {

        } else {
            echo "Exteção não pemitido";
        }
    } else {
        echo "Sem imagem";
    }
} else {
    header("location: cadastro");
}

// <?php
//     // Le a stream do Arquivo e retorna a imagem
//     $imagem = file_get_contents('imagem.png');
//     //converte a imagem em string base64
//     echo base64_encode($imagem);
//
// image.php

// <?php
// header ('Content-Type: image/png');
// echo base64_decode('codigo');
//
