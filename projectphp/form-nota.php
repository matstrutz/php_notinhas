<?php
require "includes/top.php";
require "includes/db.php";

if(isset($_GET['id'])){
    $label = 'Editar';
    $action = 'edit';

    $sql = "SELECT * FROM nota WHERE id = ".$_GET['id'];
    $listagem = $cx->query($sql);

    $linha = $listagem->fetch_assoc();

    $id = $linha['id'];
    $atividade = $linha['atividade'];
    $nota = $linha['nota'];
    $iddisciplina = $linha['id_disciplina'];
} else {
    $label = 'Cadastrar';
    $action = 'insert';

    $id = null;
    $atividade = null;
    $nota = null;
    $iddisciplina = null;
}

$discsql = "SELECT * FROM disciplina ORDER BY id";
$dropdown = $cx->query($discsql);

?>

<form method="post" action="http://localhost/projetodavid/db-nota.php?acao=<?=$action?>">
    <input type="hidden" id="id" name="id" value="<?=$id?>">

    <div class="container container-fluid">
        <h2 class="text-center mt-3">Cadastro de nota</h2>
        <div class="row">
            <div class="form-group col mt-3">
                <div class="col">
                    <label for="iddisciplina">Disciplina</label>
                    <select class="form-select" id="iddisciplina" name="iddisciplina">
                        <option value=""></option>
                        <?php while($linha = $dropdown->fetch_assoc()) { ?>
                        <option value="<?=$linha['id']?>"><?=$linha['nome']?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col mt-3">
                <div class="form-floating col">
                    <input type="atividade" class="form-control" id="atividade" name="atividade" placeholder="Atividade" value="<?=$atividade?>">
                    <label for="floatingInput">Atividade*</label>
                </div>
            </div>
            <div class="form-group col mt-3">
                <div class="form-floating col">
                    <input type="number" step="0.1" class="form-control" id="nota" name="nota" placeholder="Nota" value="<?=$nota?>">
                    <label for="floatingInput">Nota*</label>
                </div>
            </div>
        </div>
    </div>
    <div class="container col-row-12">
        <a href="list-nota.php" class="btn btn-outline-danger mt-3" role="button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z" />
                <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z" />
            </svg>
            Voltar
        </a>
        <button type="submit" class="btn btn-outline-dark mt-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg>
            Salvar
        </button>
    </div>
</form>

<?php
require "includes/bottom.php"
?>

<script>
    $('#iddisciplina').val(<?=$iddisciplina?>);
</script>