<?php

/**
 * summary
 *  Controle login 
 *
 * classe login
 * 
 * author: helenilson
 * update: 5/05/2020:
 */

//namespace App\Controllers;


class LoginController
{       
        private $email;
        private $senha;    
        public  $user=[];

    public function index()
    {
        echo 'login invalido';
    }
    // Pegando o valor do post email e senha 
    // filtrando e consultando no banco de dados
    public function autentication()
    {
        if (isset($_POST['btn-logar'])) {
            $email= isset($_POST['username'])?filter_var($_POST['username'],FILTER_SANITIZE_EMAIL):'';
            $senha= isset($_POST['senha'])   ?$_POST['senha']:'';

            $this->setEmail($email);
            $this->setSenha($senha);


             try{
                 //criando um instância da classe usere recebendo o resultado
                 $user = new User;
                 $user->setEmail($this->getEmail());
                 $user ->setPassword($this->getSenha());
                 $user->validateLogin();

                 header('location: /dashboard');
             }catch(\Exception $e){
             // se a senha ou email estiver errado o usuario sera redirecionado para home com o valor do erro na seção
//                 header('location: /');
                 $_SESSION['erro']= 'Email ou senha inválidos ';
             }
        } else {
            // se não existir um botão logar sera redirecionado para home
            header('location: / ');
        }

    }

    //metodo getter e setters

    /**
     * @return type
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @return type
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * @param type $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
        return $this;
    }

}