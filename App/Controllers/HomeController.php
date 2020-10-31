<?php
//namespace App\Controllers;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Models\Template;

// use App\Models\Produto;
// require_once 'App/Models/Produto.php';

class HomeController
{
    public function index()
    {
       $erro= isset($_SESSION['erro']) ?$_SESSION['erro']:'' ; 

        $pasta = 'App/Views';
        $arquivo= 'home.html';
        try {
            $produtos = Produto::ultimosProdutos();

        } catch (Exception $e){
            echo $e->getMessage();
        }
        $paramets['erro']=$erro;
        $paramets['produtos']= $produtos;
        $paramets['titulo'] = 'Dc perfume';
        $paramets['subtitulo']='Catalogo de perfume online';
        
             
        Template::CarregarTemplate($pasta,$arquivo,$paramets);  

        unset($_SESSION['erro']);

    //        try{
    //            $coletaPerffumes = Perfumes::RegistroPerfumes();
    //            var_dump($coletaPerffumes);
    //        }catch(Exception $e){
    //            echo $e->getMessage();
    //        }

    }

}