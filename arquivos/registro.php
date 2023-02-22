<?php
require_once('db.class.php');

$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$email =  $_POST['email'];
$dat = $_POST['dat'];
$telefone = $_POST['telefone'];
$nome_resp = $_POST['nome_resp'];
$senha = $_POST['senha'];

$objDb = new db();
$link =  $objDb->conecta_mysql();

$email_existe = false;

//checa email
$sql = "select * from usuario where email = '$email'";
if($resultado_id = mysqli_query($link,$sql)){
    $dados_usuario = mysqli_fetch_array($resultado_id);

    if(isset($dados_usuario['email'])){
        $email_existe = true;
    }

}
if($email_existe){
    $retorno_get = '';
    if($email_existe){
        $retorno_get.="erro_email=1&";
    }
    header('Location: cadastro.php?'.$retorno_get);
    die();
}




$sql = "insert into usuario(nome,endereço,email,data_nasc,telefone,senha)values('$nome','$endereco','$email','$dat','$telefone','$senha')";
mysqli_query($link,$sql);

$sql = "select cod_p as cod from usuario where email = '$email' and senha = '$senha'";
$result_cod = mysqli_query($link,$sql);

$registro = mysqli_fetch_array($result_cod,MYSQLI_ASSOC);
$cod = $registro['cod'];

$sql = "insert into aluno(nome_resp,cod_p_aluno)values('$nome_resp','$cod')";
if(mysqli_query($link,$sql)){
    header('Location: cadastro.php?sucesso=1');
}else{
    echo 'Erro ao cadastrar';
}
?>