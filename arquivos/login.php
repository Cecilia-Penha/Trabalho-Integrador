<?php

session_start();

require_once('db.class.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select cod_p,email from usuario where email = '$email' and senha = '$senha'";

$objDb = new db();
$link =  $objDb->conecta_mysql();

$resultado_id = mysqli_query($link,$sql);
if($resultado_id){
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['email'])){
        $_SESSION['cod_p'] = $dados_usuario['cod_p'];
        $_SESSION['email'] = $dados_usuario['email'];
        
        header('Location:home.php');
    }else{
        header('Location: entrar.php?erro=1');
    }
}else{
    echo 'Erro';
}



?>