<?php
require_once('db.class.php');

$nome_mod = $_POST['nome_mod'];
$valor_mod = $_POST['valor_mod'];
$dia_mod = $_POST['dia_mod'];
$hora_mod = $_POST['hora_mod'];

$objDb = new db();
$link =  $objDb->conecta_mysql();

$sql = "insert into modalidade(nome_m,valor,dia,horario)values('$nome_mod',$valor_mod,'$dia_mod','$hora_mod')";

if(mysqli_query($link,$sql)){
    header('Location: cadastro_mod.php?sucesso=1');
}else{
    echo 'Erro ao inserir';
}
?>