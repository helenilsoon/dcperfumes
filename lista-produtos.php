<?php

session_start();
if (isset($_SESSION['user'])) {
    $usuario = $_SESSION['user'];
    require_once "con.php";

    $con = new Con();
    $link = $con->conectar();
    $sql = "SELECT * FROM tb_produtos order by id asc";

    $res = mysqli_query($link, $sql);

    if ($res) {

        echo " 
      <div class='container-cadProduto'>
        <h1>Produtos</h1>
            <table>
                <thead>
                  <tr>
                    <th></th>
                     <th class='valor_cvc'>Quant</th>
                    <th class='valor_cvc' >Cod</th>
                     <th>Nome</th>
                     <th>ml</th>
                     <th>Marca</th>
                     <th>Tipo</th>
                     <th>Sexo</th>
                     <th class='valor_cvc'>Valor Compra</th>
                     <th class='valor_cvc'>valor venda</th>
                     <th class='valor_cvc'>valor catalogo</th>

                 </tr>
             </thead>
             <tbody>";


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

//        Celula de cada linha
//            onclick=\"location.href='produto_update.php?id=$id'\"
            echo"<tr>
                    <td>
                        <button class='tbl_btnEditar' value='produto_update.php?id=$id'>editar</button> 
                        <button class='tbl_btnExcluir'value='$id'>excluir</button>
                        
                    </td>
                    
                    
                     <td>$id</td>
                     <td>$cod_produto</td>
                     <td>$nome</td>
                     <td>$ml</td>
                     <td>$marcas</td>
                     <td>$classificao</td>
                     <td>$sexo</td>
                     <td>$valor_compra</td>
                     <td>$valor_venda</td>
                     <td>$valor_catalogo</td>
                 </tr>";
        } // fechamento do while
        echo "</tbody>
        </table>
        <div class='tbl_certeza'>Tem Certeza 
                            <button class='tbl_btnSim'>Sim</buttom>
                            <button class='tbl_btnNao'>Nâo</buttom>
                         </div>
        </div>";
    } //fechamento do if
} else {
    header("location: index.php");
    die;
}

?>

<script src='js/script.js'></script>