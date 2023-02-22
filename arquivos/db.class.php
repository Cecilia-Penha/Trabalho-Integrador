<?php
class db{
    //host
    private $host = 'localhost';

    //usuario
    private $usuario = 'root';

    //senha
    private $senha = '';

    //banco
    private $database = 'matricula';

    public function conecta_mysql(){
        $conn =  mysqli_connect($this->host,$this->usuario,$this->senha,$this->database);
        
        //mysqli_set_charset($conn,'utf-8');

        if(mysqli_connect_errno()){
            echo 'Erro ao conectar '.mysqli_connect_error();
        }
        return $conn;
    }


}
?>