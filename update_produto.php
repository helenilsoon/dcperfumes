
<?php

//require_once "wideimage/lib/WideImage.php";

if (isset($_POST['f_btn'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
//Recebendo os Dados,filtrando e limpados as string e os números
        $cod = isset($_POST['f_cod']) ? filter_var($_POST['f_cod'], FILTER_SANITIZE_NUMBER_INT) : 0;
        $nome = isset($_POST['f_nome']) ? filter_var($_POST['f_nome'], FILTER_SANITIZE_STRING) : "";
        $ml = isset($_POST['f_ml']) ? filter_var($_POST['f_ml'], FILTER_SANITIZE_STRING) : "";
        $marcas = isset($_POST['f_marcas']) ? filter_var($_POST['f_marcas'], FILTER_SANITIZE_STRING) : "";
        $sexo = isset($_POST['f_sexo']) ? filter_var($_POST['f_sexo'], FILTER_SANITIZE_STRING) : "";
        $classi = isset($_POST['f_classi']) ? filter_var($_POST['f_classi'], FILTER_SANITIZE_STRING) : "";
        $valorCatalogo = isset($_POST['f_valorCatalogo']) ? filter_var($_POST['f_valorCatalogo'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0;
        $valorVenda = isset($_POST['f_valorVenda']) ? filter_var($_POST['f_valorVenda'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0;
        $valorCompra = isset($_POST['f_valorCompra']) ? filter_var($_POST['f_valorCompra'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : 0;

        $fileImg = isset($_FILES['f_file']["name"]) ? $_FILES['f_file']['name'] : "";

//array das exteção permitidas
        $exte = ['.jpg', '.gif', '.png', '.jpeg'];

        $extesao = strtolower(substr($_FILES['f_file']["name"], -4));
//testando uma outra forma de pegar a esteção do arquivo
        // $file = $_FILES['f_file']['name'];
        // $png = pathinfo($file, PATHINFO_EXTENSION);

//Testando se tem arquivo de imagem
        if ($_FILES['f_file']['name'] !== "") {
            if (in_array($extesao, $exte)) {
                //atribuiindo um novo nome para imagem
                $novoNomeImg = str_replace(" ", "-", $fileImg);
                //pasta da imagem
                $pasta = __DIR__ . "/img/produtos/";
                //movendo da pasta temporaria para img/como novo nome
                move_uploaded_file($_FILES['f_file']['tmp_name'], $pasta . $novoNomeImg);

            } else {
                echo "Exteção não pemitido";
            }
        } else {
            echo "Sem imagem";
        }

//requisitando uma conexão
        require_once "con.php";
//intanciando e conectado
        $con = new Con();
        $link = $con->conectar();
//verificando imagem pra não cadastrar vazio no banco de dados
        $image = "SELECT img  FROM tb_produtos where id = $id";
        $resposta = mysqli_query($link, $image);
        if ($nomeimage = mysqli_fetch_assoc($resposta)) {
            $nomeimage = $nomeimage['img'];
        } else {
            echo "Não tem imagem no banco de dados";
        }

// verificando pra variavel receber o mesmo valor da img pra não cadastrar vazio

        if ($fileImg === "") {
            $novoNomeImg = $nomeimage;
        }

//inserindo no Banco de Dados
        $sql = "UPDATE tb_produtos set codProduto=$cod,ml='$ml',classificao='$classi',sexo='$sexo',marcas='$marcas',nome='$nome',img='$novoNomeImg',valor_catalogo=$valorCatalogo,valor_compra=$valorCompra,valor_venda=$valorVenda where id = $id";
        echo $sql;
        $res = mysqli_query($link, $sql);
//se tiver afetado alguma linha retorna sucesso
        if (mysqli_affected_rows($link)) {
            echo "Atualizado com sucesso";
        } else {
            echo "erro ao atualizar o produto";
        }

    } else {
        echo "Erro ";
        die;
    }

} else {
    header("location: cadastro-produto.php");
}
