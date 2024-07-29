<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Validação do usuário (exemplo: consulta ao banco de dados)
    if ($email === 'marcos@gmail.com' && $senha === '1@3456') {
        $_SESSION['UsuarioID'] = 1; // Define o ID do usuário na sessão
        header("Location: index.php");
        exit;
    } else {
        $erro = "Credenciais inválidas!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Título</title>
    <!-- CSS bootstrap -->
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- CSS customizzado -->
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>

<body>

    <main role="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-container">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-center mb-4">Login</h3>
                                <?php if (isset($erro)) : ?>
                                    <div class="alert alert-danger"><?php echo $erro; ?></div>
                                <?php endif; ?>
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="senha" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="senha" name="senha" required>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                                    </div>
                                </form>
                                <div class="mt-3 text-center">
                                    <a href="#">Esqueceu sua senha?</a>
                                </div>
                                <div class="mt-3 text-center">
                                    <a href="#">Registrar-se</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2024 Marcos Alexandre. Todos os direitos reservados.</p>
            <p class="mb-0">Desenvolvido por <a href="https://github.com/marcos-rts" class="text-white">Marcos Alexandre</a></p>
        </div>
    </footer> -->
</body>
<script type="text/javascript" src="../assets/js/bootstrap.js"></script>

</html>