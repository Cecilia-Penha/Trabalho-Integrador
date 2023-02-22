<?php

session_start();

require_once('db.class.php');

$cod_f = $_POST['cod_f'];
$senha_f = $_POST['senha_f'];

$sql = "select cod_f,senha_f from funcionario where cod_f = '$cod_f' and senha_f = '$senha_f'";

$objDb = new db();
$link =  $objDb->conecta_mysql();

$resultado_id = mysqli_query($link,$sql);
if($resultado_id){
    $dados_usuario = mysqli_fetch_array($resultado_id);
    if(isset($dados_usuario['cod_f'])){
        $_SESSION['cod_f'] = $dados_usuario['cod_f'];
        $_SESSION['cod_p'] = $dados_usuario['cod_p_func'];
        
        header('Location:modalidades.php');
    }else{
        header('Location: entrar.php?erro=2');
    }
}else{
    echo 'Erro';
}



?>