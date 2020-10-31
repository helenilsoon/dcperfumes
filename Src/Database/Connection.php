<?php
/*
 * Class conexão no padrão singleton
 * */

namespace Src\Database;
//Abstrada não pode ser instânciada
abstract class Connection
{
//    para acessar variavel static $conn tem que usar palavra reservada Self::$conn
    private static $conn;

    public static function getConn()
    {
        if (self::$conn == null) try {
            //        Variavel $conn armazena um obejto coneção
            self::$conn = new \PDO('mysql: host=localhost; dbname=db_dcperfumes;','root','1234',
                array(
                \PDO::ATTR_PERSISTENT=>true,

            ));
        } catch (\PDOException $e){
            echo 'Erro ao connectar banco de dados ERRO= '.$e->getMessage();
        } catch(\PDOException $e){
            echo 'Erro generico '.$e->getMessage();

        }

        return self::$conn;
    }

}