<?php

require_once "con.php";

class UltimosProdAdc
{
    public function ultProdAdc()
    {

        $con = new Con();
        $link = $con->conectar();
        $sql = "SELECT * FROM tb_produtos order by id desc limit 8";
        $res = mysqli_query($link, $sql);
        if ($res) {
            while ($r = mysqli_fetch_assoc($res)) {
                $id = $r['id'];
                $cod_produto = $r['cod_produto'];
                $ml = $r['ml'];
                $classificao = $r['classificao'];
                $sexo = $r['sexo'];
                $marcas = $r['marcas'];
                $nome = $r['nome'];
                $img = $r['img'];
                $valor_catalogo = $r['valor_catalogo'];
                $valor_compra = $r['valor_compra'];
                $valor_venda = $r['valor_venda'];
                $lucro_a_vista = $r['lucro_a_vista'];
                $lucro_2x = $r['lucro_2x'];
                $lucro_3x = $r['lucro_3x'];
                $lucro_4x = $r['lucro_4x'];
                $lucro_5x = $r['lucro_5x'];
                $lucro_6x = $r['lucro_6x'];
                $data_cadastro = $r['data_cadastro'];

                echo "          <div class='produto'>";
                echo "            <a href='produto.php?id=$id'>";
                echo "                <div class='img-produto'>";
                echo "                    <img src='img/produtos/$img'>";
                echo "                </div>";
                echo "                <div class='info-produto'>";
                echo "                    <p class='nome-produto'> $nome de $ml</p>";
                echo "                    <p class='valor-compra'>valor de compra R$$valor_compra</p>";
                echo "                    <p class='valor-venda'> R$$valor_venda</p>";
                echo "            </a>";
                echo "                </div>'";
                echo "            </div>";

            } // fechamento do while

        } //fechamento do if

    }
}
