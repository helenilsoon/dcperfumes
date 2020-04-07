<?php

namespace Classes;

use Classes\ClassConexao;
/**
 * classe de busca
 */
class ClassBuscar
{

    private $busca;
   

    public function search(){
    	$con = new ClassConexao();
    	$con = $con->conectar();
    	$sql = "SELECT * FROM tb_produtos where MATCH (nome,marcas,ml,sexo) AGAINST ('{$this->busca}*' IN BOOLEAN MODE)";
        echo $sql;
    	$link = mysqli_query($con, $sql);

    	if ($link) {
    		$produtos=array();
    		while ($r = mysqli_fetch_assoc($link)) {
    			$produtos[]=$r;
    		}
    	}else{
    		echo 'Erro na execução do ccodigo';
    	}


    	foreach($produtos as $pesquisa){
    		print_r($pesquisa);
    		echo '<br>';
    	}

    }
    public function getBusca(){
    	return $this->busca;
    }
    public function setBusca($search){
    	$this->busca=$search;
    }

}
