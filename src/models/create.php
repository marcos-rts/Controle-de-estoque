<?php include $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
$pdo = Banco::conectar();
$sql1 = 'SELECT TB_CATEGORIA.NomeCategoria FROM TB_CATEGORIA';
$sql2 = 'SELECT TB_LOCALIZACAO.NomeLocalizacao FROM TB_LOCALIZACAO';
?>
<form>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="NomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="NomeProduto" placeholder="Nome do Produto">
        </div>
        <div class="form-group col-md-6">
            <label for="categoria">Categoria</label>
            <select id="categoria" class="form-control">
                <option selected>Escolher...</option>
                <?php
                foreach ($pdo->query($sql1) as $row) {
                    echo '<option>'. $row['NomeCategoria'] .'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="localizacao">Localização</label>
            <select id="localizacao" class="form-control">
                <option selected>Escolher...</option>
                <?php
                foreach ($pdo->query($sql2) as $row) {
                    echo '<option>'. $row['NomeLocalizacao'] .'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="disponivel">
            <label class="form-check-label" for="gridCheck">
                Disponivel para saida?
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>