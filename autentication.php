<?php
session_start();
if (isset($_POST['btn-logar'])) {
    $nome = isset($_POST['username']) ? $_POST['username'] : "";
    $senha = md5(isset($_POST['senha']) ? $_POST['senha'] : "");

    require_once "con.php";
    //Conexão
    $con = new Con();
    $con = $con->conectar();
    //Query de consulta
    $sql = "SELECT nome,password FROM tb_user where nome = '$nome' and password = '$senha'";

    $link = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)) {
        $chave1 = "abcdefghijklmnopqrstuvxwyz";
        $chave2 = "ABCDEFGHIJKLMNOPQRSTUVXWYZ";
        $chave3 = "0123456789";
        $chave4 = str_shuffle($chave1 . $chave2 . $chave3);
        $tam = strlen($chave4);
        $k = "";
        $qtde = rand(20, 50);
        for ($i = 0; $i < $qtde; $i++) {
            $pos = rand(0, $tam);
            $k .= substr($chave4, $pos, 1);
        }
        $res = mysqli_fetch_assoc($link);

        $nome = $res['nome'];
        $_SESSION['user'] = $nome;
        $_SESSION['key'] = $k;
        header("location: admin.php?k=$k");
    } else {
        header("location: index.php?erro=login_incorreto");
    }

} else {
    header("location: index.php");
    die;

}
