<?php
session_start();

require_once('db.class.php');

$objDb = new db();
$link =  $objDb->conecta_mysql();
$cod= $_POST['cod'];
$mod=$_POST['mod'];


$sql = "select count(cod_m) as conta from modalidade where cod_m = $mod"; 
$result_existe_mod = mysqli_query($link,$sql);
if($result_existe_mod){
    while($registro = mysqli_fetch_array($result_existe_mod,MYSQLI_ASSOC)){
       $conta = $registro['conta'];
       if($conta <=0){
        echo 'Código inválido!';
        die();
       }
    }
}

$sql = "select c_aluno,c_mod from alunos_mod where c_aluno = $cod and c_mod = $mod";
$consulta_mat = mysqli_query($link,$sql);
if($consulta_mat){
   while($registro = mysqli_fetch_array($consulta_mat,MYSQLI_ASSOC)){
        if($registro['c_aluno']==$cod && $registro['c_mod']==$mod){
            echo'Você já se matriculou nessa turma!';
            die();
        }
   }
}
$sql = "select m.dia as dia,m.horario as horario from modalidade as m join alunos_mod as am on am.c_mod = m.cod_m
where am.c_mod in (select c_mod from alunos_mod where c_aluno = $cod)";
$consulta_dia = mysqli_query($link,$sql);
if($consulta_dia){
    while($registro = mysqli_fetch_array($consulta_dia,MYSQLI_ASSOC)){
        $dia = $registro['dia'];
        $horario = $registro['horario'];
        $sql = "select dia as dia_m,horario as horario_m from modalidade where cod_m = $mod";
        $consulta = mysqli_query($link,$sql);
        $registro_mod = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
        $dia_m = $registro_mod['dia_m'];
        $horario_m = $registro_mod['horario_m'];
        if($dia_m==$dia && $horario_m==$horario){
            echo 'Você já se matriculou em uma turma nesse horário!';
            die();
        }
    }
}


$sql = "insert into alunos_mod(c_aluno,c_mod)values ($cod,$mod)";

$result_mat = mysqli_query($link,$sql);
if($result_mat){
    echo 'Matrícula realizada com sucesso!';
}
?> 