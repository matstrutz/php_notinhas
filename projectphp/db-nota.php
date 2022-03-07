<?php
require "includes/top.php";
require "includes/db.php";

if($_GET['acao'] == 'insert'){
    $sql = "INSERT INTO nota (atividade, nota, id_disciplina) VALUES ('".$_POST['atividade']."', ".$_POST['nota'].", ".$_POST['iddisciplina'].")";

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-nota.php");
    } else {
        echo "Error";
    }
}
else if($_GET['acao'] == 'edit'){
    $sql = "UPDATE nota set atividade = '".$_POST['atividade']."', nota = ".$_POST['nota'].", id_disciplina=".$_POST['iddisciplina']." WHERE id = ".$_POST['id'];

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-nota.php");
    } else {
        echo "Error";
    }
}
else if($_GET['acao'] == 'delete'){
    $sql = "DELETE FROM nota WHERE id = ".$_POST['id'];

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-nota.php");
    } else {
        echo "Error";
    }
}

require "includes/bottom.php"
?>