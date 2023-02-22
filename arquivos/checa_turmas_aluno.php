<?php
session_start();

if(!isset($_SESSION['email'])){
    header('Location: entrar.php?erro=1');
}

require_once('db.class.php');

$objDb = new db();
$link =  $objDb->conecta_mysql();
$cod = $_SESSION['cod_p'];

$sql = "select m.cod_m as cod,m.nome_m as nome,m.valor as valor,m.dia as dia,m.horario as horario from modalidade as m join alunos_mod as am on am.c_mod = m.cod_m where am.c_aluno = $cod order by nome";
$result = mysqli_query($link,$sql);

if($result){
    while($registro = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo '<a href="#" class="list-group-item">';
        echo '<h4 class="list-group-item-heading">'.$registro['nome'].' <small> - '.$registro['horario'].' </small></h4>';
        echo '<p class="list-group-item-text">'.$registro['dia'].'<br> R$'.$registro['valor'].',00</p>';
        echo '<p class="list-group-item-text"style="text-align:right">'.$registro['cod'].'</p>';
        echo '</a>';
    }
}
?>