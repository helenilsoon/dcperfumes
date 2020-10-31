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
$token = sha1(rand());

echo "<div class='menu'>";
echo "	<div class='cotainer-menu'>";
echo "		<div class='logo'>";
echo "			<img src='img/Nova_LOGO_ Dcperfumes_160x160.p.jpg'>";
echo "		</div>";
echo "		<div class='menu-link'>";
echo "			<a href='index.php'>Inicio</a>";

if ($usuario !== "") {
    echo "		<a href='admin.php'>Admin</a>";
    echo "		<a href=''>$usuario</a>";
    echo "		<a href='sair.php'>Sair</a>";
} else {
    echo "		<a href='#'id='login' >LOGIN</a>";
}

//formulario de login
echo "			<div class='login'>";
echo "				<div class='icon-quadrado'></div>";
echo "				<h2>Entrar</h2>";

echo "				<form action='autentication.php' method='POST' id='f_login'>";
echo "					<div>";
echo "						<label for='username'>Username:</label>";
echo "						<input type='text' class='f_login_campo' name='username' id='usename' autocomplete='off'>";
echo "					</div>";
echo "					<div>";
echo "						<label for='senha'>Senha</label>";
echo "						<input type='password' class='f_login_campo' name='senha' id='senha'>";
echo "					</div>";
echo "					<input type='submit' name='btn-logar' class='btn-logar' value='entrar'>";

//Se tiver erro vai aparece mensagem de erro
if ($erro !== "") {echo "<div class='erro'>$erro</div>";}

echo "				</form>";
echo "			</div>";

echo "		</div>";
echo "	</div>";
echo "</div>";

//login

// $('#login').click(function() {
//         alert("vc clicou");

//     // if ($('#login').hide()) {
//     //     $('#login').slideDown();
//     // } else {
//     //     $('.#login').hide();
//     // }
// });
