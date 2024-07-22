<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

// Capturando os dados do formuulario
$nomeProduto = $_POST['NomeProduto'];
$categoriaID = $_POST['categoriaID'];
$localizacaoID = $_POST['localizacaoID'];
$quantidade = $_POST['quantidade'];
// Se o checkbox 'disponivel' estiver marcado, define como 1, caso contrário, 0
$disponivel = isset($_POST['disponivel']) ? 1 : 0;

// Inicializa uma lista para coletar mensagens de erro
$errors = [];

// Verificando se os campos obrigatórios foram preenchidos
if (empty($nomeProduto)) {
    $errors[] = "Nome do Produto é obrigatório.";
}
if (empty($categoriaID)) {
    $errors[] = "Categoria é obrigatória.";
}
if (empty($localizacaoID)) {
    $errors[] = "Localização é obrigatória.";
}
if (empty($quantidade)) {
    $errors[] = "Quantidade é obrigatória.";
}


// Se houver erros, exibe-os; caso contrário, processa a inserção no banco de dados
if (count($errors) > 0) {
    // Exibe as mensagens de erro
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
} else {
    $pdo = Banco::conectar();

    // Preparando a declaração SQL para inserir os dados na tabela TB_PRODUTOS
    $sql = "INSERT INTO TB_PRODUTOS (NomeProduto, Quantidade, DisponivelParaSaida, TB_CATEGORIA_Id, TB_LOCALIZACAO_Id) 
            VALUES (:NomeProduto, :Localizacao, :Disponivel, :CategoriaID, :LocalizacaoID)";

    // Preparando a declaração SQL para execução
    $stmt = $pdo->prepare($sql);

    // Ligando os parâmetros
    $stmt->bindParam(':NomeProduto', $nomeProduto);
    $stmt->bindParam(':Quantidade', $quantidade);
    $stmt->bindParam(':Disponivel', $disponivel);
    $stmt->bindParam(':CategoriaID', $categoriaID);
    $stmt->bindParam(':LocalizacaoID', $localizacaoID);

    // Executando a inserção
    if ($stmt->execute()) {
        echo "Produto inserido com sucesso!";
    } else {
        echo "Erro ao inserir o produto.";
    };

    Banco::desconectar();
}
