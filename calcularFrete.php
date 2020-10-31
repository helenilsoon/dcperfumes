<?php

class CalcularFrete
{
    public $data = [
        'nCdEmpresa' => '',
        'sDsSenha' => '',
        'sCepOrigem' => '', //Cep de origem
        'sCepDestino' => '', //Cep de destino
        'nVlPeso' => '', //Peso da encomenda,em quilogramas,1000 para kg
        //formato da encomenda
        // 1 - Formato caixa/pacote
        // 2 - Formato rolo/prisma
        // 3 -Envelope
        'nCdFormato' => '1',
        'nVlComprimento' => '',
        'nVlAltura' => '',
        'nVlLargura' => '',
        'nVlDiametro' => '',
        'sCdMaoPropria' => 'n', //serviço de mão propria "S"para sim "n" não
        'nVlValorDeclarado' => '0', //Valor declarado da encomenda,em reais.Informa "0" para não ultilizar esse serviço
        'sCdAvisoRecebimento' => 's', //Aviso de recebimento da mercadoria, "S"para sim "n" não
        //codigo de serviço Sedex,Pac
        // 04014 SEDEX à vista
        // 04510 PAC à vista
        // 04782 SEDEX 12 ( à vista)
        // 04790 SEDEX 10 (à vista)
        // 04804 SEDEX Hoje à vista
        'nCdServico' => '',
        //"XML" - Formato XMl
        // "Popup"- Resultado será abero em uma janela popup
        //<URL> -Resultado é enviado via post para uma página do requisitante
        'StrRetorno' => 'xml',
    ];
    public $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

    // public function __construct()
    // {
    //     $cepOrigem = isset($_POST['f_cepOrigem']) ? $_POST['f_cepOrigem'] : "g";
    //     $cepDestino = isset($_POST['f_cepDestino']) ? $_POST['f_cepDestino'] : "g";
    //     $peso = isset($_POST['f_peso']) ? $_POST['f_peso'] : "g";
    //     echo $cepOrigem;
    //     echo $cepDestino;
    //     echo $peso;
    //     pac($cepOrigem, $cepDestino, $peso);
    //     sedex($cepOrigem, $cepDestino, $peso);

    // }

//     PACOTE E CAIXA
    // Especificações     Mínimo     Máximo
    // Comprimento (C)     16 cm     100 cm
    // Largura (L)        11 cm     100 cm
    // Altura (A)         2  cm     100 cm
    // Soma (C+L+A)     29 cm     200 cm

// A soma resultante do comprimento + largura + altura não deve superar 200 cm.
    public function pac($cep_origem, $cep_destino, $peso)
    {
        $this->data['sCepOrigem'] = $cep_origem;
        $this->data['sCepDestino'] = $cep_destino;
        $this->data['nVlPeso'] = $peso;
        $this->data['nVlComprimento'] = '16';
        $this->data['nVlAltura'] = '4';
        $this->data['nVlLargura'] = '11';
        $this->data['nVlDiametro'] = '0';
        $this->data['sCdMaoPropria'] = 'n';
        $this->data['nCdServico'] = '04510';

        $servico = 'PAC';
        $data = $this->data;
        $this->curlE($data, $servico);

    }

    public function sedex($cep_origem, $cep_destino, $peso)
    {

        $this->data['sCepOrigem'] = $cep_origem;
        $this->data['sCepDestino'] = $cep_destino;
        $this->data['nVlPeso'] = $peso;
        $this->data['nVlComprimento'] = '16';
        $this->data['nVlAltura'] = '5';
        $this->data['nVlLargura'] = '15';
        $this->data['nVlDiametro'] = '0';
        $this->data['sCdMaoPropria'] = 'n';
        $this->data['nCdServico'] = '04014';
        $servico = 'SEDEX';
        $data = $this->data;
        $this->curlE($data, $servico);

    }

    public function curlE($data, $servico)
    {

        //tranforma array em url com paramentros
        $data = http_build_query($data);

        // inicia  curl e salva em um variavel concatenando com  url
        $curl = curl_init($this->url . '?' . $data);

        // evia a requisição para o web service atraves do curl
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        //salvanndo a resposta em uma variavel
        $result = simplexml_load_string($result);

        // verificando em cada indice do array e salvando como linha para acessar
        echo '<br />Serviço= ' . $servico . '<br />';
        foreach ($result->cServico as $row) {
            if ($row->Erro == 0) {
                echo "VALOR: R$" . $row->Valor . '<br />';
                echo "PRAZO DA ENTREGA= " . $row->PrazoEntrega;

            } else {
                echo "Erro ao recuperar respotas";
            }
        }

    }
}

// $cepOrigem = isset($_POST['f_cepOrigem']) ? $_POST['f_cepOrigem'] : "";
// $cepDestino = isset($_POST['f_cepDestino']) ? $_POST['f_cepDestino'] : "";
// $peso = isset($_POST['f_peso']) ? $_POST['f_peso'] : "";
//$calc = new CalcularFrete();
// $calc->sedex($cepOrigem, $cepDestino, $peso);

// $calc = new CalcularFrete();
// $calc->pac($cepOrigem, $cepDestino, $peso);
