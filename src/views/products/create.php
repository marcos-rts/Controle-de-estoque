<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/header.php'; ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../../../public/index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="./list.php">Lista</a></li>
    <li class="breadcrumb-item active" aria-current="page">Adição produto</li>
  </ol>
</nav>

<main>
  <div class="container">
    <form action="./../../controllers/CreateController.php" method="post">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/models/create.php' ?>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

</main>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/footer.php' ?>