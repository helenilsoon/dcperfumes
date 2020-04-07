<?php 

include "lib/vendor/autoload.php";
use Classes\ClassProduto;

$produto = new ClassProduto();
$produto->setCodigo(3325);
$produto->setNome("Silver scent");
$produto->setMarca("Jacque Borgat");
$produto->setSexo("Masculino");
$produto->setMl("100ml");
$produto->setTipo("perfume");


echo 'CODIGO= '.$produto->getCodigo()."<br>";
echo 'NOME= '.$produto->getNome()."<br>";
echo 'MARCA= '.$produto->getMarca()."<br>";
echo 'SEXO= '.$produto->getSexo()."<br>";
echo 'Ml= '.$produto->getML()."<br>";
echo 'Tipo= '.$produto->getTipo()."<br>";


$precoCatalago=68;
$produto->setValor($precoCatalago);
$valor = $produto->valorVenda($precoCatalago);
$valorCompra = $produto->valorCompra($precoCatalago);
echo"Preço do catalago ".$precoCatalago;
echo '<br>Preço do produto e '.$valor;
echo '<br>Preço que foi comprado '.$valorCompra;



var_dump($produto);




