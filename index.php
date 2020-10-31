<?php
// Mostrando Erros
session_start();
//ini_set('display_errors',1);
$loader = require __DIR__ . '/vendor/autoload.php';
require_once 'Config/config.php';

require_once 'Src/Database/Connection.php';
require_once 'Core/Core.php';
require_once 'App/Controllers/LoginController.php';
require_once 'App/Controllers/AdminController.php';
require_once 'App/Controllers/TemplateController.php';
require_once 'App/Controllers/DashboardController.php';
require_once 'App/Controllers/HomeController.php';
require_once 'App/Controllers/MarcasController.php';
require_once 'App/Controllers/ErroController.php';
require_once 'App/Controllers/SearchController.php';
require_once 'App/Controllers/ProdutoController.php';

require_once 'App/Models/Produto.php';
require_once 'App/Models/User.php';



$url = new Core();
$url= $url->start($_GET);
