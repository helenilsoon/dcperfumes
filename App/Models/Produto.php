<?php


// namespace App\Models;

use Src\Database\Connection;


class Produto
{


    private $Id,$codProduto,$ml,$sexo,$nome,$img;
    private $peso,$valorCatalogo,$valorCompra,$valorVenda;
    private $lucroaVista,$lucro2x,$lucro3x,$lucro4x,$lucro5x,$lucro6x,$dataCadastro,$url;
    private $clasificacaoIdClasificacao,$marcasIdMarcas,$categoriaIdCategoria,$quantEstoque;




    public static function  ultimosProdutos()
    {
        $conn = Connection::getConn();
        $sql = "SELECT * FROM produto ORDER BY id DESC";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
            $res=[];
        if ($stmt->rowCount()) {
            while ($row= $stmt->fetchObject('Produto')) {
               $res[] = $row;
            }
                return $res;
            
        }else{
            throw new Exception("Não foi encontrado nenhum dado");
        }
     }

//     fazendo um consulta no banco de dados pelo id e retornando o valor para o controller

    public static function consultaProduto($url)
    {
        $conn =Connection::getConn();
        $sql = "SELECT * FROM produto where url = :url";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':url',$url );
        $stmt->execute();
         if($stmt->rowCount()){
             $r = $stmt->fetchObject();

         }else{

             header('location: /Erro');
         }
            return $r;
    }

/*
* Getter e setters
*
 *  */

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodProduto()
    {
        return $this->codProduto;
    }
    public function setCodProduto($codProduto)
    {
        $this->codProduto = $codProduto;
    }

    public function getMl()
    {
        return $this->ml;
    }
    public function setMl($ml)
    {
        $this->ml = $ml;
    }

    public function getClassificao()
    {
        return $this->classificao;
    }
    public function setClassificao($classificao)
    {
        $this->classificao = $classificao;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getMarcas()
    {
        return $this->marcas;
    }
    public function setMarcas($marcas)
    {
        $this->marcas = $marcas;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }

    public function getValorCatalogo()
    {
        return $this->valorCatalogo;
    }
    public function setValorCatalogo($valorCatalogo)
    {
        $this->valorCatalogo = $valorCatalogo;
    }

    public function getValorCompra()
    {
        return $this->valorCompra;
    }
    public function setValorCompra($valorCompra)
    {
        $this->valorCompra = $valorCompra;
    }

    public function getValorVenda()
    {
        return $this->valorVenda;
    }
    public function setValorVenda($valorVenda)
    {
        $this->valorVenda = $valorVenda;
    }

    public function getLucroaVista()
    {
        return $this->lucroaVista;
    }
    public function setLucroaVista($lucroaVista)
    {
        $this->lucroaVista = $lucroaVista;
    }

    public function getLucro2x()
    {
        return $this->lucro2x;
    }
    public function setLucro2x($lucro2x)
    {
        $this->lucro2x = $lucro2x;
    }

    public function getLucro3x()
    {
        return $this->lucro3x;
    }
    public function setLucro3x($lucro3x)
    {
        $this->lucro3x = $lucro3x;
    }

    public function getLucro4x()
    {
        return $this->lucro4x;
    }
    public function setLucro4x($lucro4x)
    {
        $this->lucro4x = $lucro4x;
    }

    public function getLucro5x()
    {
        return $this->lucro5x;
    }
    public function setLucro5x($lucro5x)
    {
        $this->lucro5x = $lucro5x;
    }

    public function getLucro6x()
    {
        return $this->lucro6x;
    }
    public function setLucro6x($lucro6x)
    {
        $this->lucro6x = $lucro6x;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }
    public function getUrl()
    {
        return $this->url;
    }


    public function setUrl($url)
    {
        $this->url = $url;
    }






}
