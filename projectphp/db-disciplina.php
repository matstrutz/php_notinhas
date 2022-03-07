<?php
require "includes/top.php";
require "includes/db.php";

if($_GET['acao'] == 'insert'){
    $sql = "INSERT INTO disciplina (nome) VALUES ('".$_POST['nome']."')";

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-disciplina.php");
    } else {
        echo "Error";
    }
}
else if($_GET['acao'] == 'edit'){
    $sql = "UPDATE disciplina set nome = '".$_POST['nome']."' WHERE id = ".$_POST['id'];

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-disciplina.php");
    } else {
        echo "Error";
    }
}
else if($_GET['acao'] == 'delete'){
    $sql = "DELETE FROM disciplina WHERE id = ".$_POST['id'];

    if($cx->query($sql) === TRUE) {
        header("Location: http://localhost/projetodavid/list-disciplina.php");
    } else {
        echo "Error";
    }
}

require "includes/bottom.php"
?>