<?php
session_start();
$nome = isset($_POST['username']) ? $_POST['username'] : "";
$senha = md5(isset($_POST['senha']) ? $_POST['senha'] : "");

require_once("con.php");

$con = new Con();
$con = $con->conectar();

$sql = "SELECT nome,password FROM tb_user where nome = '$nome' and password = '$senha'";
echo $sql;

$link = mysqli_query($con, $sql);

if (mysqli_affected_rows($con)) {

	$res = mysqli_fetch_assoc($link);

	echo $res;
	var_dump($res);

	$nome = $res['nome'];
	$_SESSION['user'] = $nome;
	header("location: admin.php");
} else {
	header("location: index.php?erro=login_incorreto");
}
