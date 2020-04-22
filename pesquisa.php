<?php
if (isset($_POST['f_search'])) {
    $pesquisa = isset($_POST['f_search']) ? $_POST['f_search'] : "";
    $pesquisa = filter_var($pesquisa, FILTER_SANITIZE_STRING);

    if ($pesquisa !== "") {
        require_once "con.php";

        $con = new Con();
        $con = $con->conectar();
        $sql = "SELECT * FROM tb_produtos where MATCH (nome,marcas,ml,sexo) AGAINST ('{$pesquisa}*' IN BOOLEAN MODE) limit 20";
        $link = mysqli_query($con, $sql);

        if ($link) {

            $valor = mysqli_affected_rows($con);
            echo "<div class='resultados'>" . $valor . " Resultados encontrados para '{$pesquisa}'</div>";
            while ($res = mysqli_fetch_assoc($link)) {
                $id = $res['id'];
                $cod_produto = $res['cod_produto'];
                $ml = $res['ml'];
                $classificao = $res['classificao'];
                $sexo = $res['sexo'];
                $marcas = $res['marcas'];
                $nome = $res['nome'];
                $img = $res['img'];
                $valor_catalogo = $res['valor_catalogo'];
                $valor_compra = $res['valor_compra'];
                $valor_venda = $res['valor_venda'];
                $lucro_a_vista = $res['lucro_a_vista'];
                $lucro_2x = $res['lucro_2x'];
                $lucro_3x = $res['lucro_3x'];
                $lucro_4x = $res['lucro_4x'];
                $lucro_5x = $res['lucro_5x'];
                $lucro_6x = $res['lucro_6x'];
                $data_cadastro = $res['data_cadastro'];

                ?>

				<div class="produto">
					<div class="img-produto">
						<img src="img/produtos/<?=$img?>">

					</div>
					<div class="info-produto">
                    <a href="produto.php?id=<?=$id?>">
						<p class="nome-produto"> <?=$nome?> de <?=$ml?> </p>
						<p class="valor-compra">valor de compra R$<?=$valor_compra?></p>
						<p class="valor-venda"> R$<?=$valor_venda?></p>
                </a>
					</div>
				</div>

	<?php
}
        } else {
            echo "Erro em recuperar o dados";
        }

    } else {
        echo "Se somente aperta espaço não faz pesquisa :)";
    }

} else {

    header("location: index.php");
}
