<?php

require_once 'calcularFrete.php';

$cepOrigem = isset($_POST['f_cepOrigem']) ? $_POST['f_cepOrigem'] : "g";
$cepDestino = isset($_POST['f_cepDestino']) ? $_POST['f_cepDestino'] : "g";
$peso = isset($_POST['f_peso']) ? $_POST['f_peso'] : "g";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular cep</title>

<script src="js/jquery-3.5.0.min.js"></script>
<script>
    $(document).ready(function(){
        //função limpar Campos
        limpar();
        function limpar(){
           $('#f_cepOrigem').val('');
           $('#f_cepDestino').val('');
        }
        //executa o evento assim que sair do campo
        $('#f_cepOrigem').blur(function(event){
            //pegando o valo
            var valor = $(this).val();
            //validados camppos
            var cep= valor.replace(/\D/g,"");
            //Testando se ta vazia
                if(cep!=""){
                    //validado expresão
                    var validarcep = /^[0-9]{8}$/;

                    if(validarcep.test(cep)){

                    //Consultar o web service
                    $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?",function(dados){
                        if(!("erro" in dados)){
                            $('.origem').html(
                                "<h3>Origem:</h3>"+
                                "Rua:"+ dados.logradouro+
                                "<br />Bairro:"+dados.bairro+
                                "<br />Cidade:"+dados.localidade+
                                "<br />UF:"+dados.uf
                            );
                        }else{
                            $('.erro').html("Cep não encontrado");
                        }
                    });
                    }else{
                        $('.erro').html('Cep origem invalido ');
                        $('#f_cepOrigem').val('');
                    }
                }else{
                    $('.erro').html('Não pode ser vazio ');
                    $('#f_cepOrigem').val('');
                }
        });

        $('#f_cepDestino').blur(function(event){
            var valor = $(this).val();

            var cep= valor.replace(/\D/g,"");

            if(cep!=""){
                var validarcep = /^[0-9]{8}$/;

                if(validarcep.test(cep)){

                //Consultar o web service
                $.getJSON("https://viacep.com.br/ws/"+cep+"/json/?callback=?",function(dados){
                    if(!("erro" in dados)){
                        $('.destino').html(
                            "<h3>Destino:</h3>"+
                            "Rua:"+ dados.logradouro+
                            "<br />Bairro:"+dados.bairro+
                            "<br />Cidade:"+dados.localidade+
                            "<br />UF:"+dados.uf
                        );

                    }else{
                        $('.erro').html("Cep não encontrado");
                    }
                });
                }else{
                    $('.erro').html('Cep  destino invalido ');
                    $('#f_cepDestino').val('');
                }

            }else{
                $('.erro').html('Não pode ser vazio ');
                $('#f_cepDestino').val('');
            }





        });

        // $('#f_btnCalcular').click(function(){
        //     var cepOrigem=$('.f_cepOrigem').val();
        //     var cepDestino=$('.f_cepDestino').val();
        //     var peso=$('.f_peso').val();

        //     if(cepOrigem !=="" && cepDestino !== "" && peso !== "" ){
        //         $.ajax({
        //             url:"calcularFrete.php",
        //             mothod:"POST",
        //             data:$('#f_calcularFrete').serialize(),
        //             success:function(data){
        //                 $('.respostaFrete').html(data);
        //                 console.log(data);
        //                 alert("vazio");
        //             }
        //         });
        //     }else{
        //         $('.erro').html("Não pode ser vazio");
        //     }

        // });






    });
</script>

<style>
.erro{
    background:#F44336;
    display:inline-block;
}
.origem,.destino{
    display:flex;
    width:30%;
    background:#8BC34A;
}
</style>
</head>
<body>

</body>
</html>

<h1>Calcular Frete</h1>


<form id="f_calcularFrete" action="calcularfrete.php" method="POST">
    <label for="f_cepOrigem">Cep Origem:</label>
    <input type="text" name="f_cepOrigem" maxlength='9' id='f_cepOrigem'>
    <label for="f_cepDestino">Cep Destino:</label>
    <input type="text" name="f_cepDestino" maxlength='9' id='f_cepDestino'>
    <label for="f_peso">Peso:</label>
    <input type="text" name="f_peso" id='f_peso'>

    <input type="submit" value="Calcular" id="f_btnCalcular">

    <div class="erro"></div>

    <div class="origem"></div>
    <div class="destino"></div>
    <div class="respostaFrete">
    <?php
$calc = new CalcularFrete();
$calc->sedex($cepOrigem, $cepDestino, $peso);

$calc = new CalcularFrete();
$calc->pac($cepOrigem, $cepDestino, $peso);
?>
    </div>

</form>







