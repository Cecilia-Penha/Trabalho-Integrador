<?php
session_start();

require_once('db.class.php');

$objDb = new db();
$link =  $objDb->conecta_mysql();
$cod_mod = $_POST['turma'];

$sql = "select count(cod_m) as conta from modalidade where cod_m = $cod_mod"; 
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

$sql = "select u.nome as nome,u.endereço as endereço,u.email as email,u.data_nasc as data_nasc,u.telefone as telefone,a.nome_resp as nome_resp from alunos_mod as am join aluno as a on am.c_aluno = a.cod_p_aluno join usuario as u on a.cod_p_aluno = u.cod_p where am.c_mod = $cod_mod order by u.nome";
$result_mod = mysqli_query($link,$sql);

if($result_mod){
    while($registro = mysqli_fetch_array($result_mod,MYSQLI_ASSOC)){
        echo '<a href="#" class="list-group-item">';
        echo '<h4 class="list-group-item-heading">'.$registro['nome'].' <small> - '.$registro['data_nasc'].' </small></h4>';
        echo '<p class="list-group-item-text">'.$registro['endereço'].'<br>'.$registro['email'].' '.$registro['telefone'].'<br>'.$registro['nome_resp'].'</p>';
        echo '</a>';
        
    }
}
?>