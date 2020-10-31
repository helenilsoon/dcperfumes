<?php
// Caminho absoluto para pasta interna
$pastaInterna = "PROJETOS/Projeto_dcperfumes/";
define("URL_BASE", "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

//Caminho absoluto para as requisições do servidor

if (substr($_SERVER['DOCUMENT_ROOT'], -1) =="/") {
 
    define("DIR_REQ","{$_SERVER['DOCUMENT_ROOT']}{$pastaInterna}");
} else {
    
    define("DIR_REQ", "{$_SERVER['DOCUMENT_ROOT']}/{$pastaInterna}");
}

//Caminhos especifico css,js,img
define("DIR_IMG",URL_BASE."Public/img/");
define("DIR_CSS",URL_BASE."Public/css/");
define("DIR_JS",URL_BASE."Public/js/");
define("DIR_FONT",URL_BASE."Public/font/");