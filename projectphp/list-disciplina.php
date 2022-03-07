<?php
require "includes/top.php";
require "includes/db.php";

$sql = "SELECT * FROM disciplina ORDER BY id";
$listagem = $cx->query($sql);
?>

<div class="container text-center">
    <h2 class="text-center mt-3">Listagem das disciplinas</h2>
    <table class="mt-3 table table-secondary table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Codigo</th>
                <th scope="col">Nome</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php
            while ($linha = $listagem->fetch_assoc()) {
            ?>

                <tr>
                    <td class="align-middle"><?= $linha['id'] ?></td>
                    <td class="align-middle"><?= $linha['nome'] ?></td>
                    <td>
                        <a type="button" class="btn btn-outline-dark" href="http://localhost/projetodavid/form-disciplina.php?id=<?= $linha['id'] ?>" title="Editar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                            </svg>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger" onclick="exclude(<?= $linha['id'] ?>, '<?= $linha['nome'] ?>')" title="Excluir">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </button>
                    </td>
                </tr>

            <?php } ?>

        </tbody>
    </table>
    <div class="container col-row-12">
        <div class="text-end">
            <a href="form-disciplina.php" class="btn btn-outline-dark" role="button">Cadastro</a>
        </div>
    </div>
</div>

<form method="post" action="http://localhost/projetodavid/db-disciplina.php?acao=delete">
    <div class="modal fade" id="excludeModal" tabindex="-1" aria-labelledby="excludeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excludeModalLabel">Excluir a disciplina?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p id="del-name"></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                </div>
            </div>
            
            <input type="hidden" id="id" name="id">
        </div>
    </div>
</form>

<script>
    function exclude(id, displayName) {
        $('#del-name').html(displayName);
        $('#id').val(id);
        $('#excludeModal').modal('show');
    }
</script>
<?php
require "includes/bottom.php";
?>