<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

require_once "con.php";

$con = new Con();
$link = $con->conectar();
$sql = "SELECT * FROM tb_produtos where id = $id ";
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

    }

} else {
    echo "Erro ao fazer a consulta";
}

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
        
        //    Voltar para pagina anterior
      $('#btn_voltar').click(function() {
        $('.pag').load("lista-produtos.php");
        
        $('.container-caixa').hide();
        return false;
    });

    });
</script>



<link rel="stylesheet" type="text/css" href="css/style.css">

<div class="container-cadProduto">
    <button id="btn_voltar">Voltar</button>
    <h1>Atualizar produto</h1>
    
    
    <form action="update_produto.php?id=<?=$id?>" method="POST" enctype="multipart/form-data">
        
        <div class="i">
             <div class="img">
                    <img src="img/produtos/<?=$img?>" alt="">
                </div>

                <label for="f_file">Escolha uma imagem:</label><br>
                <input type="file" name="f_file" id="f_file" accept=".png,.jpg,.gif,.jpeg"><br>
                <span class="f_aviso">Aceitos somente:jpg,png,gif max:10MB</span>
                <div id="valor_img">

                </div>

        </div>

        <div>
<br>
        <div class="form_box_campo">
            <div>
                <label for="f_cod">Codigo:</label><br>
                <input type="number" class="form_cadProd-campo" id="f_cod" name="f_cod" id="f_cod" required placeholder="ex: 3456" autofocus value="<?=$cod_produto?>">
            </div>
        </div>
        <div class="form_box_campo">
            <div>
                <label for="f_nome">Nome:</label><br>
                <input type="text" class="form_cadProd-campo" name="f_nome" id="f_nom" required placeholder=" Nome do produto" value="<?=$nome?>">
            </div>
            <div class="ml">
                <label for="f_ml">ml</label><br>
                <select class="select" name="f_ml" required >
                    <option value="<?=$ml?>"><?=$ml?></option>
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
                <label for="f_marcas">Marcas</label><br>
                <select class="select" name="f_marcas" id="f_marcas" required>
                    <option value="<?=$marcas?>"><?=$marcas?></option>
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
                <label for="f_sexo">sexo</label><br>
                <select class="select" name="f_sexo" id="f_sexo"required>
                    <option value="<?=$sexo?>"><?=$sexo?></option>
                    <option>MASCULINO</option>
                    <option>FEMININO</option>
                </select>

            </div>
        </div>
        <div class="form_box_campo">
            <div>
                <label for="f_classificacao">Classificação</label><br>
                <select class="select" name="f_classi" required id="f_classificacao">
                    <option value="<?=$classificao?>"><?=$classificao?></option>

                    <option value="EDT">EDT - Eau de Toilette</option>
                    <option value="EDP">EDP - Eau de Parfum</option>
                    <option value="EDC">EDC - Eau de Cologne</option>
                    <option value="PDT">PDT - Parfum de Toilette</option>

                </select>
            </div>
        </div>



        </div>



        <div class="form_box_campo">
            <div>
                <label for="f_valorCatalogo">Valor no Catalogo:</label><br>
                R$:<input type="number"  step="any"class="form_cadProd-campo" name="f_valorCatalogo" id="f_valorCatalogo" required placeholder="ex: R$35.78 " value="<?=$valor_catalogo?>">
            </div>
            <div>
                <label for="">Valor p/ Venda:</label><br>
                R$:<input type="number"  step="any"   class="form_cadProd-campo"  name="f_valorVenda" id="f_valorVenda" placeholder="ex: R$35.78" value="<?=$valor_venda?>">
                <br>
                <span class="f_aviso">preenchido automaticamente</span>

            </div>
            <div>
                <label for="">Valor de compra:</label><br>
                R$:<input type="number"  step="any"  class="form_cadProd-campo" name="f_valorCompra" id="f_valorCompra" placeholder="R$ 00.00" value="<?=$valor_compra?>">
                <br>
                <span class="f_aviso">preenchido automaticamente</span>

            </div>
        </div>



         <div class="form_box_campo">


            </div>
        </div>


                <div class="f_btn">
                <input type="submit" class="f_cadProd-btn" name="f_btn" value="Atualizar">
                <input type="reset" class="f_cadProd-btn" value="Limpar">
                </div>



    </form>

</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

$(document).ready(function(){
    $('input:file').change(function(){

        var name=this.files[0].name;
        var tamanho= this.files[0].size;
        var tipo =this.files[0].type;
        
        //tamanho = parseFloat((tamanho/1024).toFixed(4));

        $('#valor_img').html(
            "Nome: "+name+"<br>"+"Tipo: "+tipo+"<br>"+"Tamanho: "+tamanho+"MB"

        );
    });

});
// $('input[type="file"]').change(function(){
//         var file = this.files[0];
//         $("#test").append('Filename : ' + file.name + '<br />Filesize : ' + file.size);
// });


 </script>
