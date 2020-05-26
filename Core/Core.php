<?php
/*
 *  autor: helenilson Oliveira
 *  data :
 *
 *
 *  Classe que controla o sistema
 *  Pega todas as requisição get e retorna a pagina apropriada
 * */


class Core
{
    private $url;
    private $controller;
    private $method = 'index';
    private $params = array();
    private $user;

    public function __construct()
    {
//        Se tiver uma sessão o sistema respoderar quais página o usuario pode acessar
        $this->user = $_SESSION['user'] ?? null;
    }

    public function start($urlGet)
    {
        if (isset($urlGet['url'])) {
            // pega as requisiçõe e trasnfoma em um array

            $this->url = explode('/', $urlGet['url']);
            // a primeira e o controle
            $this->controller = ucfirst($this->url[0]) . 'Controller';

            array_shift($this->url);
            // se existir um valor em um array na posição 0 ou for diferente de vazio
            //se o usuario não digitar nada o valor padrão do metodo e index
            if (isset($this->url[0]) && $this->url[0] != '') {
                // A segunda e o método
                $this->method = $this->url[0];
                array_shift($this->url);


                if (isset($this->url[0]) && $this->url[0] != '') {
                    // o tereciro e o parametro
                    $this->params = $this->url[0];

                }

                if (!method_exists($this->controller, $this->method)) {
                    $this->controller = 'ErroController';
                    $this->method = 'index';
                }


            }
            if ($this->user) {

                $permission_pg = ['DashboardController', 'HomeController', 'ProdutoController'];
                if (!isset($this->controller) || !in_array($this->controller, $permission_pg)) {
                    if (class_exists($this->controller)) {
                        switch ($this->controller) {
                            case 'DashboardController':
                                $this->controller = 'DashboardController';
                                $this->method = 'index';
                                break;
                            case 'HomeController'  :
                                $this->controller = 'HomeController';
                                $this->method = 'index';
                                break;
                        }
                    } else {
                        $this->controller = 'ErroController';
                        $this->method = 'index';
                    }


                }
            } else {
                $permission_pg = ['HomeController', 'LoginController', 'ErroController', 'ProdutoController','SearchController'];
                if (!isset($this->controller) || !in_array($this->controller, $permission_pg)) {
                    if (!class_exists($this->controller)) {
                        $this->controller = 'ErroController';
                        $this->method = 'index';
                    } else {

                        $this->controller = 'HomeController';
                        $this->method = 'index';
                    }

                }
            }


        } else {
            $this->controller = 'HomeController';
            $this->method = 'index';
        }


        call_user_func(array(new $this->controller, $this->method), $this->params);

    }
}