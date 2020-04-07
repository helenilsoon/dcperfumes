<?php

require_once "ControleRemoto.php";

ini_set("display_errors", 1);
$controle = new ControleRemoto();
$controle->ligar();
$controle->abrirMenu();

echo 'por aquie tudo certo';
