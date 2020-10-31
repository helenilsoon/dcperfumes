<?php
namespace Src\Classes;


class ClassLogin
{	
	public $nome;
	public $usuario;
	private $cpf;	
	protected $password;
	private $idade;
	private $sexo;

	public function logar()
	{
		if($this->password ==""){
			echo "<p>não pode estar vazio<p>";
		}else{
			echo "<p>logando<p>";
		}	
	}


	public function vazia(){	$this->password = "";}
	public function noVazia(){  $this->password = 82111971;}

	public function getNome()   {return $this->nome;}	
	public function getCpf()    {return $this->cpf;}
	public function getUsuario(){return $this->usuario;}
	public function getIdade()  {return $this->idade;}
	public function getSexo()   {return $this->sexo;}
	public function getPassword()   {return $this->password;}

	public function setNome($nome){	      $this->nome=$nome;}
	public function setUsuario($usuario){ $this->usuario=$usuario;}
	public function setCpf($cpf){	      $this->cpf = $cpf;}
	public function setIdade($idade){     $this->idade=$idade;}
	public function setSexo($sexo){	      $this->sexo=$sexo;}
	public function setPassword($password){$this->password=$password;}

    // public function __construct()
    // {
    //     echo "esta funcionando";
    // }
}




