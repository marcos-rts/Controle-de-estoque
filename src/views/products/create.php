<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/header.php';

// Inicializa a variável de mensagem de status
$statusMessage = '';

// Verifica se o parâmetro de status está presente na URL
if (isset($_GET['status']) && $_GET['status'] === 'success') {
  $statusMessage = 'Produto adicionado com sucesso!';
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../../../public/index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="./list.php">Lista</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adição produto</li>
  </ol>
</nav>

<main>
  <div class="container">

    <!-- Alerta de sucesso -->
    <?php if ($statusMessage) : ?>
      <div class="alert alert-success" role="alert">
        <?php echo $statusMessage; ?>
      </div>
    <?php endif; ?>
    <!-- Fim do alerta de sucesso -->

    <!-- Começo do formulario -->
    <form action="./../../controllers/CreateController.php" method="post">

      <!-- Importação do codigo de funcionalidade do formulario -->
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/models/create.php' ?>


      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <!-- Final do formulario -->

  </div>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/footer.php' ?>