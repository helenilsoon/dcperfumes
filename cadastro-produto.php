<?php
require_once "con.php";

$con = new Con();
$link = $con->conectar();
$sql = "SELECT * FROM tb_marcas order by nome ASC";
$res = mysqli_query($link, $sql);
?>

<script>
    $(document).ready(function(){


        $('#f_valorCatalogo').keyup(function(){

            var valorCatalogo = parseFloat($('#f_valorCatalogo').val());


            $('#f_valorVenda').val(valorVenda());
            $('#f_valorCompra').val(valorCompra());
            function valorVenda(){
                valorVenda = valorCatalogo+(valorCatalogo*(15/100));
                return valorVenda;
            }
            function valorCompra(){
                valorCompra= valorCatalogo-(valorCatalogo*(30/100));
                return valorCompra;
            }

        });


    });
</script>



<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="container-cadProduto">
    <h1>Cadastro de produto</h1>
    <form action="cad_prod.php" method="POST" enctype="multipart/form-data">

        <br>
        <div class="form_box_campo">
            <div>
                <label for="">Codigo:</label><br>
                <input type="number" class="form_cadProd-campo" id="f_cod" name="f_cod" id="">
            </div>
        </div>
        <div class="form_box_campo">
            <div>
                <label for="">Nome:</label><br>
                <input type="text" class="form_cadProd-campo" name="f_nome" id="">
            </div>
            <div class="ml">
                <label for="">ml</label><br>
                <select class="select" name="f_ml">
                    <option value="">Selecione</option>
                    <option value="30ml">30ml</option>
                    <option value="50ml">50ml</option>
                    <option value="75ml">75ml</option>
                    <option value="100ml">100ml</option>
                    <option value="125ml">125ml</option>
                    <option value="150ml">150ml</option>
                    <option value="200ml">200ml</option>

                </select>
            </div>

        </div>
        <div class="form_box_campo">
            <div>
                <label for="marcas">Marcas</label><br>
                <select class="select" name="f_marcas" id="marcas">
                    <option value="">Selecione</option>
                    <?php
if ($res) {
    while ($marcas = mysqli_fetch_assoc($res)) {
        $nome = $marcas['nome'];
        echo "<option value='{$nome}' >{$nome}</option>";
    }
}
?>
                </select>
            </div>
            <div class="form_sexo">
                <label for="">sexo</label><br>
                <select class="select" name="f_sexo">
                    <option value="">Selecione</option>
                    <option>MASCULINO</option>
                    <option>FEMININO</option>
                </select>

            </div>
        </div>
        <div class="form_box_campo">
            <div>
                <label for="f_classificacao">Classificação</label><br>
                <select class="select" name="f_classi">
                    <option value="">Selecione</option>

                    <option value="EDT">EDT - Eau de Toilette</option>
                    <option value="EDP">EDP - Eau de Parfum</option>
                    <option value="EDC">EDC - Eau de Cologne</option>
                    <option value="PDT">PDT - Parfum de Toilette</option>

                </select>
            </div>
        </div>


        <div class="form_box_campo">
            <div>
                <label for="">Valor no Catalogo:</label><br>
                R$:<input type="number"  step="any"class="form_cadProd-campo" name="f_valorCatalogo" id="f_valorCatalogo">
            </div>
            <div>
                <label for="">Valor p/ Venda:</label><br>
                R$:<input type="text"     class="form_cadProd-campo"  name="f_valorVenda" id="f_valorVenda">
                <br>
                <span style="color:#ccc;font-size:0.7em;">preenchido automaticamente</span>

            </div>
            <div>
                <label for="">Valor de compra:</label><br>
                R$:<input type="number"  step="any"  class="form_cadProd-campo" name="f_valorCompra" id="f_valorCompra">
                <br>
                <span style="color:#ccc;font-size:0.7em;">preenchido automaticamente</span>

            </div>
        </div>
        <div class="form_box_campo">
            <label for="">
                <input type="file" name="f_file" id="" accept=".png,.jpg,.gif,.jpeg">
        </div>
            <div></div>
        <div class="form_box_campo">
            <label for="">
                <input type="submit" class="f_cadProd-btn" name="f_btn" value="Cadastrar">
                <input type="reset" class="f_cadProd-btn" value="Limpar">

        </div>


    </form>

</div>

<?php

echo "<img src='{$img}'>";