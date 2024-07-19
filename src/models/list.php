<?php

include '../../config/database.php';
$pdo = Banco::conectar();
$sql = 'SELECT * FROM TB_PRODUTOS ORDER BY Id DESC';
foreach ($pdo->query($sql) as $row) {
    echo $row['Id'] . ' ' . $row['NomeProduto'] . ' ' . $row['Quantidade'] . '<br>';
}



?>