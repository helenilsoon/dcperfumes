
<?php
/**  Teste de array executando um consulta e colocando em uma array
 * 
 *
 * 
 * 
 */


require_once("con.php");
$pesquisa = "100ml";
$con = new Con();
$con = $con->conectar();
$sql = "SELECT * FROM tb_produtos where MATCH (nome,marcas,ml,sexo) AGAINST ('{$pesquisa}*' IN BOOLEAN MODE)";
$link = mysqli_query($con, $sql);

if ($link) {
	$produtos=array();

	while ($r = mysqli_fetch_assoc($link)) {
	    $produtos[]=$r;
	}
}else{
	echo 'Erro na execução do ccodigo';
}


foreach($produtos as $pesquisa){
	echo($pesquisa['nome']);
	echo '<br>';
}

echo $pesquisa['nome'];