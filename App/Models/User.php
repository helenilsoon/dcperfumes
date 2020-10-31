<?php
/**
 * summary
 *  Model login
 *
 * @package:classe login
 * @author: helenilson
 * update: 5/05/2020:
 */
namespace App\Models;

use Src\Database\Connection;

class User
{
    private $id;
    private $nome;
    private $email;
    private $password;
    private $img;

    public function validateLogin()
    {
        $conn = Connection::getConn();


        $sql='SELECT * FROM funcionario where email = :email ';
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(':email',$this->email);
        $stmt->execute();

        if ($stmt->rowCount()) {
              $result = $stmt->fetch();
              $keyDb  = $result['password'];
           
           if (password_verify($this->getPassword(),$keyDb)){
            $_SESSION['id']  = $result['idfuncionario'];
            $_SESSION['user']= $result['nome'];
            return true;
            }
        }

        throw new \Exception('erro');


    }
    /*
     * Método Getters e setters
     * */
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }



}