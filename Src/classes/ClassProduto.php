<?php

namespace Src\Classes;


class ClassProduto{
	private $codigo;
	private $nome;
	private $marca;
	private $sexo;
	private $ml;
	private $tipo;
	private $valorCatalago;

	public function valorVenda($valorCatalago)
	{	
		$vl = 15;
		$valorVenda = $valorCatalago +($valorCatalago*($vl / 100));
		return $valorVenda;
	}

	function valorCompra($precoCatalago){
		 $menos= 30;
		$valorCompra=$precoCatalago -($precoCatalago*($menos/100));
		return $valorCompra;  
	}

	function desconto(){}
	function valorParcelas(){}
		//Métodos getter e setters
	public function getCodigo()
	{
		return $this->codigo;
	}
	public function setCodigo($cod)
	{
		$this->codigo  = $cod;
	}
	public function getNome()
	{
		return $this->nome;
	}
	public function setNome($nome)
	{
		$this->nome=$nome;
	}
	public function getMarca()
	{
		return $this->marca;
	}
	public function setMarca($marca)
	{
		$this->marca=$marca;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
		return $this;
	}
	public function getMl(){
		return $this->ml;
	}
	public function setMl($ml){
		$this->ml = $ml;
	}

	public function getTipo()
	{
		return $this->tipo;
	}
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getValor()
	{
		return $this->valor;
	}
	public function setValor($valor)
	{
		$this->valor  = $valor;
	}



}


