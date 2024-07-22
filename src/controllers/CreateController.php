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
    try {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO TB_PRODUTOS 
    (NomeProduto, Quantidade, DisponivelParaSaida, TB_CATEGORIA_Id, TB_LOCALIZACAO_Id)
    VALUES(?,?,?,?,?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($nomeProduto, $quantidade, $disponivel, $categoriaID, $localizacaoID));
        Banco::desconectar();

        //Redireciona para a pagina do formulario com um parametro de sucesso
        header("Location: ../views/products/create.php?status=success");

    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
