<?php
// SETS
require_once 'vendor/autoload.php';

ini_set("display_errors",1);

$produtoDao = new \App\Model\ProdutoDao();
$produtoDao->delete(8);

$produtoDao->read();

foreach($produtoDao->read() as $produto):
	echo $produto['nome']."<br>".$produto['descricao']."<hr>";
endforeach;








