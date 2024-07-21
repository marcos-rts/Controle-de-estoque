<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/header.php'; ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../../../public/index.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Lista</li>
  </ol>
</nav>

<main>
  <div class="container">
    <a role="button" class="btn btn-outline-secondary" href="./create.php">Add</a>
    <div class="table-responsive">
      <?php include $_SERVER['DOCUMENT_ROOT'] . '/src/models/list.php' ?>
    </div>
  </div>
</main>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/src/views/templates/footer.php' ?>