<?php
session_start();

require_once('db.class.php');

$objDb = new db();
$link =  $objDb->conecta_mysql();

$sql = "select cod_m as cod,nome_m as nome,valor as valor,dia as dia,horario as horario from modalidade order by nome";
$result_mod = mysqli_query($link,$sql);

if($result_mod){
    while($registro = mysqli_fetch_array($result_mod,MYSQLI_ASSOC)){
        echo '<a href="#" class="list-group-item">';
        echo '<h4 class="list-group-item-heading">'.$registro['nome'].' <small> - '.$registro['horario'].' </small></h4>';
        echo '<p class="list-group-item-text">'.$registro['dia'].'<br> R$'.$registro['valor'].',00</p>';
        echo '<p class="list-group-item-text"style="text-align:right">'.$registro['cod'].'</p>';
        echo '</a>';
    }
}
?>