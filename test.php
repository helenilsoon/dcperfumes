<?php
include "lib/vendor/autoload.php";


ini_set("display_errors", 1);
use Classes\ClassLogin;
use Classes\ClassBuscar;
echo 'aqui ok <br>';

$login = new ClassLogin();
$login->setNome("helenilson");
$login->setCpf(98249606272);
$login->setUsuario("helenilsoon");
$login->setIdade(31);
$login->setSexo("Masculino");
$login->setpassword(8738328);

$usuario =new ClassLogin();
$usuario->setNome("JUSSARA");
$usuario->setCpf(933202131203);
$usuario->setUsuario="juh";
$usuario->setIdade(21);
$usuario->setSexo("Feminino");
echo '2aqui ok <br>';

$login->noVazia();
echo"<pre>";
$logar=$login->logar();
print_r($login);
echo"</pre>";

echo"<pre>";
print_r($usuario);
echo"</pre>";

echo '3aqui ok <br>';
$buscar = new ClassBuscar();
$buscar->setBusca("100ml");
$buscar->search();


print_r($buscar['nome']);

echo '4aqui ok <br>';






