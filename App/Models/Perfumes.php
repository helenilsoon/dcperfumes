<?php
namespace App\Models;

//namespace Models;


class Perfumes
{
//    a palavra reservada static e pra pode acessar o metodo perfumes sem intância
 public static function RegistroPerfumes() {
    $con= \Connection::getConn();
    $sql = "SELECT * FROM tb_produtos ORDER BY id DESC ";
//    metodo prepare da con server
    $sql= $con->prepare($sql);
    $sql->execute();
    $resutado = array();

    while($row = $sql->fetchObject('Perfumes')){
        $resutado[]=$row;
    }
    if(!$resutado){
        throw new Exception('Não encontrado nenhum resultado');
    }
    return $resutado;
 }


}