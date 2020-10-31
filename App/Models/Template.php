<?php

namespace App\Models;
class Template
{
    private static $pasta;
    private static $arquivo;
    private static $paramets = [];

    public static function CarregarTemplate($pasta, $arquivo, $paramets = false)
    {
        self::setPasta($pasta);
        self::setArquivo($arquivo);
        if (isset($paramets)) {
            self::setParamets($paramets);
        }

        //Definindo as constante da url base do config no array paramets pra quando redenrizar o template do twig carregue o css,js,img e fontes.
        $paramets['nomesite'] ='Dcperfumes';
        $paramets['URL_BASE'] = URL_BASE;
        $paramets['DIR_REQ'] = DIR_REQ;
        $paramets['DIR_IMG'] = DIR_IMG;
        $paramets['DIR_CSS'] = DIR_CSS;
        $paramets['DIR_JS'] = DIR_JS;
        $paramets['DIR_FONT'] = DIR_FONT;

        
        self::setParamets($paramets);


        if (isset($_SESSION['user'])) {
            $paramets['usuario'] = $_SESSION['user'];
            self::setParamets($paramets);
           
        }
        

        $loader = new \Twig\Loader\FilesystemLoader(self::getPasta());
        $twig = new \Twig\Environment($loader);
        $template = $twig->load(self::getArquivo());

        echo $template->render(self::getParamets());

    }

    public function getPasta()
    {
        return self::$pasta;
    }

    public function setPasta($pasta)
    {
        self::$pasta = $pasta;
    }

    public function getArquivo()
    {
        return self::$arquivo;
    }

    public function setArquivo($arquivo)
    {
        self::$arquivo = $arquivo;
    }

    /**
     * @return array
     */
    public static function getParamets(): array
    {
        return self::$paramets;
    }

    /**
     * @param array $paramets
     */
    public static function setParamets(array $paramets)
    {
        self::$paramets = $paramets;
    }

}