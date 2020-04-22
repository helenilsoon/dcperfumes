<?php
if ($_GET['id']) {
    $id = $_GET['id'];
    require_once "con.php";

    $con = new Con();
    $link = $con->conectar();
    $sql = "SELECT * FROM tb_produtos where id= $id";

    $res = mysqli_query($link, $sql);
    if ($res) {

    }

} else {
    header("location: index.php");
    die;
}
