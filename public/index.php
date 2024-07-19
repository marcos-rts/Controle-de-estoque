<?php include '../src/views/templates/header.php'; ?>
<!-- <main>
    <h2>Home</h2>
    <p>Bem-vindo à página inicial.</p>
</main> -->
<div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Home</li>
  </ol>
</nav>

</div>
<div class="container">
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="../assets/images/list.png" alt="Imagem de capa do card">
            <div class="card-body">
                <a href=""><h5 class="card-title">Listagens Estoque</h5></a>
                <!-- <p class="card-text">Este é um card mais longo com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este conteúdo é um pouco maior.</p> -->
                <!-- <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p> -->
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src=".../100px200/" alt="Imagem de capa do card">
            <div class="card-body">
                <h5 class="card-title">Título do card</h5>
                <p class="card-text">Este é um card maior com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional. Este card tem o conteúdo ainda maior que o primeiro, para mostrar a altura igual, em ação.</p>
                <p class="card-text"><small class="text-muted">Atualizados 3 minutos atrás</small></p>
            </div>
        </div>
    </div>
</div>
<?php include '../src/views/templates/footer.php'; ?>