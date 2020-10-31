<?php


use App\Models\Template;

class ErroController
{
    public function index()
    {
	 	$pasta = 'App/Views';
        $arquivo= 'erro404.html';

        $paramets['titulo'] = 'oops';
        $paramets['subtitulo']='Erro 404 pagina não encontrada';
     	Template::CarregarTemplate($pasta,$arquivo,$paramets);
    }

}