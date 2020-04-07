<?php
session_start();
if (isset($_SESSION['user'])) {
	$usuario = $_SESSION['user'];
} else {
	header("location: index.php");
	die;
}

require_once("con.php");

$con = new Con();
$link = $con->conectar();


// Saber a Quantida de Regtro
$qtd_produto = "SELECT * FROM tb_produtos "; //Quantidades produto
$resProdutos = mysqli_query($link, $qtd_produto); //query de consulta
$rowsProtudos = mysqli_affected_rows($link); //quantidade de linhas
$qtd_produto .= "ORDER BY id DESC limit 1";

$resProdutos = mysqli_query($link, $qtd_produto);
if ($produto = mysqli_fetch_assoc($resProdutos)) {
	$cod_produto = $produto['cod_produto'];
	$ml = $produto['ml'];
	$classificao = $produto['classificao'];
	$sexo = $produto['sexo'];
	$marcas = $produto['marcas'];
	$nome = $produto['nome'];
	$img = $produto['img'];
	$valor_catalogo = $produto['valor_catalogo'];
	$valor_compra = $produto['valor_compra'];
	$valor_venda = $produto['valor_venda'];
}



$qtd_marcas = "	SELECT * FROM tb_marcas"; //Quantidade marcas
$resMarcas = mysqli_query($link, $qtd_marcas); //query de consulta
$rowMarcas = mysqli_affected_rows($link);




?>
<!DOCTYPE html>
<html>

<head>
	<script>
		document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
	</script>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>



</head>

<body>
	<?php require_once("menu.php"); ?>

	<main>


		<div class="container-main">
			<div class="painel-menu">

				<span class="close">&equiv;</span>

				<a class="painel-a" href="">Produtos
					<span class="menu-icon ">
						<img src="img/icon/perfume.svg" alt="">
					</span>
				</a>

				<a class="painel-a" href="">Marcas
					<span class="menu-icon">M</span>
				</a>

				<a class="painel-a" id="cadProduto" href="#">Cadastrar produtos
					<span class="menu-icon icon-add ">
						<img src="img/icon/add.svg" alt="">
					</span>
				</a>

				<a class="painel-a " href="">Cadastrar marcas
					<span class="menu-icon icon-add ">
						<img src="img/icon/add.svg" alt="">
					</span>
				</a>

				<a class="painel-a" href="">Usuarios
					<span class="menu-icon icon-user">
						<img src="img/icon/user.svg" alt="">
					</span>
				</a>

				<a class="painel-a" href="">Configuração
					<span class="menu-icon icon-user">
						<img src="img/icon/settings.svg" alt="Configurções">
					</span>

				</a>



			</div>


			<div class="container-painel-produto">
				<div class="painel-header">
					<h1>Olá <?= $usuario ?></h1>
				</div>

				<div class="pag">

				</div>
				<div class="container-caixa">


					<div class="painel-produto">
						<p>Ultimos produtos adicionados</p>
						<div class="ult-produto">
							<div class="ult-img-produto">
								<img src="img/one-man-show.jpeg">

							</div>
							<div class="ult-info-produto">
								<p class="ult-nome-produto"> <?= $nome ?> de <?= $ml ?></p>
								<p class="ult-valor-compra">valor de compra R$<?= $valor_compra ?></p>
								<p class="ult-valor-venda"> R$<?= $valor_venda ?></p>

							</div>
						</div>
					</div>
					<div class="caixa painel-qtd-produto">
						<p>produtos registrados</p>
						<spam><?= $rowsProtudos ?></spam>
					</div>
					<div class="caixa painel-marcas">
						<p>Macas registrados</p>
						<spam><?= $rowMarcas ?></spam>
					</div>

					<div class=" caixa painel-m">
						painel-marcas
					</div>
					<div class="caixa painel-r">
						painel-marcas
					</div>

				</div>
			</div>


		</div>

	</main>
	<!--main-->


	<?php require_once("rodape.php"); ?>


</body>

<script src="js/script.js"></script>

</html>