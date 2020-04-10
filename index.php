<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : "";
require_once "con.php";

$con = new Con();
$link = $con->conectar();
$sql = "SELECT * FROM tb_produtos order by id desc limit 8";

$res = mysqli_query($link, $sql);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Dcperfume sistema</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<body>
	<?php require_once "menu.php";?>
	<div class="container">
		<div class="header">
			<form id="pesquisa">
				<div class="f_conjunto">
					<input type="search" name="f_search" id="search" placeholder="Qual perfume? ">
					<button id="button">Pesquisar</button>
				</div>
			</form>
		</div>

		<div class="main">


			<div class="container-produto"></div>

		</div>
		<h1>Útimos adicionados</h1>
		<br>
		<div class="ultimos-add">
			<?php
if ($res) {
    while ($r = mysqli_fetch_assoc($res)) {

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

					<div class="produto">
						<div class="img-produto">
							<img src="<?=$img?>">

						</div>
						<div class="info-produto">
							<p class="nome-produto"> <?=$nome?> de <?=$ml?></p>
							<p class="valor-compra">valor de compra R$<?=$valor_compra?></p>
							<p class="valor-venda"> R$<?=$valor_venda?></p>

						</div>
					</div>

			<?php
} // fechamento do while

} //fechamento do if

?>

		</div>




	</div>
	<?php require_once "rodape.php";?>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="js/script.js"></script>

</html>