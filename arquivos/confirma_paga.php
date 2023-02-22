<?php
session_start();

if(!isset($_SESSION['email'])){
    header('Location: entrar.php?erro=1');
}

require_once('db.class.php');

$objDb = new db();
$link =  $objDb->conecta_mysql();
$cod = $_POST['cod'];
$mod = $_POST['mod'];
$forma = $_POST['forma'];

$sql = "select valor as valor from modalidade where cod_m = $mod";
$result_mod = mysqli_query($link,$sql);
if($result_mod){
    while($registro = mysqli_fetch_array($result_mod,MYSQLI_ASSOC)){
        $valor = $registro['valor'];
    }
}
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
$sql = "select count(c_mod) as conta from alunos_mod where c_mod = $mod and c_aluno = $cod"; 
$result_existe_aluno = mysqli_query($link,$sql);
if($result_existe_aluno){
    while($registro = mysqli_fetch_array($result_existe_aluno,MYSQLI_ASSOC)){
       $conta = $registro['conta'];
       if($conta <=0){
        echo 'Código inválido!';
        die();
       }
    }
}

$sql = "insert into pagamento(forma_p,valor,cod_aluno_paga,cod_mod_paga)values('$forma',$valor,$cod,$mod)";
$result_paga = mysqli_query($link,$sql);
if($result_paga){
    echo 'Pagamento realizado com sucesso!';
}

?>