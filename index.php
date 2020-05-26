<?php
// Mostrando Erros
ini_set('display_errors',1);

require_once 'Core/Core.php';

$url = new Core();
$url= $url->start($_GET);


//require_once 'App/Controllers/ErrorController.php';
//require_once 'App/Controllers/HomeController.php';


//require_once __DIR__ . '/vendor/autoload.php';
//echo __DIR__;
//
//use App\Controllers\ErroController;
//use App\Controllers\HomeController;
////
//use Core\Core;

//Inserindo template
//$template = file_get_contents('Template/estrutura.html');
//ob_start();
//    $url = new Core();
//    $url= $url->start($_GET);
//$saida = ob_get_contents();
//ob_end_clean();
//$tpl = str_replace('{{titulo}}',$saida,$template);
//
//echo $tpl;

//var_dump($saida);



//$home = new ErroController();
//$home->index();