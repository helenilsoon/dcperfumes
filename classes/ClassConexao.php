<?php
namespace Classes;


class ClassConexao
{ 
	private	$host="localhost";
	private	$user="root";
	private	$password="1234";
	private	$database="dcperfumes";

	public function conectar()
	{
		$con = mysqli_connect(
			$this->host,
			$this->user,
			$this->password,
			$this->database

		);
		//comunicação charset utf8
		mysqli_set_charset($con,'utf8');
		if(mysqli_connect_errno()){
			echo "Erro na conexão com o Banco de Dados ".mysqli_connect_error();
		}
		return $con;
	}

}
