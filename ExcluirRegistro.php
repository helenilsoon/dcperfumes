<?php
/**
 * Description of ExcluirRegistro
 *
 * @author helenilson
 */session_start();
if (isset($_SESSION['user'])) {
    $usuario = $_SESSION['user'];
    
     if(isset($_POST['id'])){
        $id= filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
        require_once 'RegistroProdutos.php';
        $registro= new RegistroProdutos();
        $reg= $registro->excluirProd($id);
        
    }else{
        echo"Erro id";
    
    }
        
} else {
    header("location: index.php");
    die;
}
    
    

