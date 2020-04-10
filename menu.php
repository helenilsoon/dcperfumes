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
    echo "<a href='#'id='login' >LOGIN</a>";
}
?>
			<div class="login">
				<div class="icon-quadrado"></div>
				<h2>Entrar</h2>
				<form action="autentication.php" method="POST" id="f_login">
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


    //login


    // $('#login').click(function() {
	// 		alert("vc clicou");

    //     // if ($('#login').hide()) {
    //     //     $('#login').slideDown();
    //     // } else {
    //     //     $('.#login').hide();
    //     // }
    // });
</script>