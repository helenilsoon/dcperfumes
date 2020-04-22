<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : "";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Dcperfume | Catalogo online</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width,initial-scale=1">

</head>

<body>
	<!-- Menu -->
	<?php require_once "menu.php";?>

	<div class="container">
		<div class="header">
		<!-- Formulario de pesquisa -->
			<form id="pesquisa">
				<div class="f_conjunto">
					<input type="search" name="f_search" id="search" placeholder="Qual perfume? ">
					<button id="button">Pesquisar</button>
				</div>
			</form>

		</div>

		<div class="main">

			<div class="container-produto">
			</div>

		</div>
		<!-- Container dos ultimos produtos adiconados -->
		<h1>Útimos adicionados</h1>
		<br>
		<div class="ultimos-add">
<?php
require_once "UltimosProdutosAdc.php";

$ultimosProduto = new UltimosProdAdc();
$ultimosProduto->ultProdAdc();
?>

		</div>




	</div>
	<?php require_once "rodape.php";?>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="js/script.js"></script>

</html>