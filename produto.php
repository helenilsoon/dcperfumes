<?php

$id = isset($_GET['id']) ? $_GET['id'] : "";
require_once "con.php";

$con = new Con();
$link = $con->conectar();
$sql = "SELECT * FROM tb_produtos where id= $id";

$res = mysqli_query($link, $sql);

if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {
        $id = $r['id'];
        $cod_produto = $r['cod_produto'];
        $ml = $r['ml'];
        $classificao = $r['classificao'];
        $sexo = $r['sexo'];
        $marcas = $r['marcas'];
        $nome = $r['nome'];
        $img = $r['img'];
        $valor_catalogo = $r['valor_catalogo'];
        $valor_compra = $r['valor_compra'];
        $valor_venda = $r['valor_venda'];
        $lucro_a_vista = $r['lucro_a_vista'];
        $lucro_2x = $r['lucro_2x'];
        $lucro_3x = $r['lucro_3x'];
        $lucro_4x = $r['lucro_4x'];
        $lucro_5x = $r['lucro_5x'];
        $lucro_6x = $r['lucro_6x'];
        $data_cadastro = $r['data_cadastro'];
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

<script src="js/script.js"></script>

</head>
<body>
<?php require_once "menu.php";?>

        <div class="pg-produto">
        <h1> <?=$nome?></h1>
             <div class="container-pg-produto">
                <div class="pg-produto-img">
                        <figure>
                            <img src="img/one-man-show.jpeg" alt="">
                        </figure>

                    </div>
                    <div class="pg-produto-info">
                        <div class="container-info">
                            <p>Cod:<?=$cod_produto?></p>
                            <h4>Marca:<?=$marcas?></h4>
                            <h4>Nome: <?=$nome?> <?=$ml?></h4>
                            <p>Claxificação:<?=$classificao?></p>
                            <p>sexo:<?=$sexo?></p>
                            <p class="valor-compra">valor de compra: R$<?=$valor_compra?></p>
                            <p class="valor-compra">valor de Catalogo: R$<?=$valor_catalogo?></p>

                            <p class="valor-venda"> Valor P/venda: R$<?=$valor_venda?></p>


                        </div>

                    </div>

                    </div>
        </div>

<?php
} // fechamento do while

} //fechamento do if
?>
<?php include_once "rodape.php";?>
</body>
</html>