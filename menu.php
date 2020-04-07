<?php
session_start();
$usuario = isset($_SESSION['user']) ? $_SESSION['user'] : "";
$erro = isset($_GET['erro']) ? $_GET['erro'] : "";
switch ($erro) {
    case 'login_invalido':
        $erro = "precisa fazer login! :(";
        break;
    case 'login_incorreto':
        $erro = "Login ou senha incorreto! :(";
        break;

    default:
        $erro = "";
        break;
}
?>

<div class="menu">
	<div class="cotainer-menu">
		<div class="logo">
			<img src="img/Nova_LOGO_ Dcperfumes_160x160.p.jpg">
		</div>
		<div class="menu-link">
			<a href="index.php">Inicio</a>

			<?php
if ($usuario !== "") {
    echo "<a href='admin.php'>Admin</a>";
    echo "<a href=''>$usuario</a>";
    echo "<a href='sair.php'>Sair</a>";
} else {
    echo "<a onmouseover='entrar()'' >LOGIN</a>";
}

?>
			<div class="login" id="login">
				<div class="icon-quadrado"></div>
				<h2>Entrar</h2>
				<form action="autentication.php" method="POST">
					<div>
						<label for="username">Username:</label>
						<input type="text" class="f_login_campo" name="username" id="usename" autocomplete="off">
					</div>
					<div>
						<label for="senha">Senha</label>
						<input type="password" class="f_login_campo" name="senha" id="senha">
					</div>
					<input type="submit" name="btn-logar" class="btn-logar" value="entrar">

					<?php if ($erro !== "") {
    echo "<div class='erro'>{$erro}</div>";
}?>
				</form>

			</div>

		</div>
	</div>


</div>



<script>
	var ele = document.getElementById('login');
	ele.addEventListener("mouseleave", esconder);
	var erro = document.querySelector('.erro');
	if (erro) {
		$('.login').slideDown();
	} else {
		esconder();
	}

	function entrar() {
		$('.login').slideDown();
	}

	function esconder() {
		$('.login').css({
			"display": "none"
		});
	}
</script>