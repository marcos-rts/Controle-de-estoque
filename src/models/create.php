<?php include $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';
$pdo = Banco::conectar();
$sql1 = 'SELECT * FROM TB_CATEGORIA';
$sql2 = 'SELECT * FROM TB_LOCALIZACAO';
?>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="NomeProduto">Nome do Produto</label>
            <input type="text" class="form-control" id="NomeProduto" name="NomeProduto" placeholder="Nome do Produto">
        </div>
        <div class="form-group col-md-6">
            <label for="categoriaID">Categoria</label>
            <select id="categoriaID" name="categoriaID" class="form-control">
                <option selected>Escolher...</option>
                <?php
                foreach ($pdo->query($sql1) as $row) {
                    echo '<option value="'. $row['Id'] .'">' . $row['NomeCategoria'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-10">
            <label for="localizacaoID">Localização</label>
            <select id="localizacaoID" name="localizacaoID" class="form-control">
                <option selected>Escolher...</option>
                <?php
                foreach ($pdo->query($sql2) as $row) {
                    echo '<option value="'. $row['Id'] .'">' . $row['NomeLocalizacao'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" name="quantidade">
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="disponivel" name="disponivel">
            <label class="form-check-label" for="disponivel">
                Disponível para saída?
            </label>
        </div>
    </div>