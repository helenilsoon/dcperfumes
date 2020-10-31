<?php


use App\Models\Template;

class ProdutoController
{
    public function index(){
        header('location: '.URL_BASE);
    }

//    metodo pra apresentar um produto
//  esta indo no models produto e retornando um array com os valores
    public  function perfume($params = false)
    {


        $pasta = 'App/Views';
        $arquivo= '_perfume.html';

         // se não tiver paramentro sera redirecionado para pagina principal
        if (isset($params) && $params != null) {
            $perfume = Produto::consultaProduto($params);


            $paramets['perfume']= $perfume;

            // carregando template
            Template::CarregarTemplate($pasta,$arquivo,$paramets);

        }else{
            header('location: '.URL_BASE);
        }


    }

}