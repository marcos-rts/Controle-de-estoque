<?php
// include '../../config/database.php';
// $pdo = Banco::conectar();
// $sql = 'SELECT * FROM TB_PRODUTOS ORDER BY Id DESC';
// foreach ($pdo->query($sql) as $row) {
//     echo $row['Id'] . ' ' . $row['NomeProduto'] . ' ' . $row['Quantidade'] . '<br>';
// }
?>

<table class="table">
    <!-- Cabeçalho -->
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
        </tr>
    </thead>
    <!-- Corpo -->
    <tbody>
        <!-- Comando PHP com SQL para trazer a lista -->
        <?php
        include '../../../config/database.php';
        $pdo = Banco::conectar();
        $sql = 'SELECT * FROM TB_PRODUTOS ORDER BY Id DESC';
        foreach ($pdo->query($sql) as $row) {
            echo '<th scope="row">' . $row['Id'] . ' </th>';
            echo '<td>' . $row['NomeProduto'] . ' </td>';
            echo '<td>' . $row['Quantidade'] . ' </td>';
        }
        ?>
        <!-- Fim dos comandos -->
    </tbody>
</table>