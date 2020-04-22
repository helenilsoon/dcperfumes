<?php
/**
 * Description of ExcluirRegistro
 *
 * @author helenilson
 */
    
    if(isset($_POST['id'])){
        $id= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        require_once 'RegistroProdutos.php';
        $registro= new RegistroProdutos();
        $reg= $registro->excluirProd($id);
        
    }else{
        echo"Erro id";
        
    
    }
         

