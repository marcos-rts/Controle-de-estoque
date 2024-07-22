<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

// include '../../config/database.php';
// $pdo = Banco::conectar();
// $sql = 'SELECT * FROM TB_PRODUTOS ORDER BY Id DESC';
// foreach ($pdo->query($sql) as $row) {
//     echo $row['Id'] . ' ' . $row['NomeProduto'] . ' ' . $row['Quantidade'] . '<br>';
// }

?>

<table class="table table-striped tale-sm">
    <!-- Cabeçalho -->
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Categoria</th>
            <th scope="col">Localização</th>
        </tr>
    </thead>
    <!-- Corpo -->
    <tbody>
        <!-- Comando PHP com SQL para trazer a lista -->
        <?php
        $pdo = Banco::conectar();
        // $sql = 'SELECT * FROM TB_PRODUTOS ORDER BY Id DESC';
        $sql = 'SELECT 
            TB_PRODUTOS.Id, TB_PRODUTOS.NomeProduto, TB_PRODUTOS.Quantidade, 
            TB_CATEGORIA.NomeCategoria,
            TB_LOCALIZACAO.NomeLocalizacao
                FROM TB_PRODUTOS 
            INNER JOIN TB_CATEGORIA
                ON TB_PRODUTOS.TB_CATEGORIA_Id = TB_CATEGORIA.Id
            INNER JOIN TB_LOCALIZACAO
                ON TB_PRODUTOS.TB_LOCALIZACAO_Id = TB_LOCALIZACAO.Id
            ORDER BY TB_PRODUTOS.Id DESC';
        foreach ($pdo->query($sql) as $row) {
            echo '<tr>';
            echo '<th scope="row">' . $row['Id'] . ' </th>';
            echo '<td>' . $row['NomeProduto'] . ' </td>';
            echo '<td>' . $row['Quantidade'] . ' </td>';
            echo '<td>' . $row['NomeCategoria'] . ' </td>';
            echo '<td>' . $row['NomeLocalizacao'] . ' </td>';
            echo '</tr>';
        }
        ?>
        <!-- Fim dos comandos -->
    </tbody>
</table>