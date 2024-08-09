<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    // Redireciona para a página de login se o usuário não estiver logado
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="../css/styles_inicial.css"> <!-- Inclua o arquivo CSS -->
</head>
<body>
    <header>
        <h1>Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    </header>
    <main>
        <section class="welcome">
            <h2>Estamos felizes em tê-lo(a) aqui.</h2>
            <p>Aqui você pode acessar seus dados, verificar mensagens e muito mais.</p>
        </section>
        <section class="options">
            <button onclick="location.href='dados_usuario.html'">Meus Dados</button>
            <button onclick="location.href='mensagens.html'">Mensagens</button>
            <button onclick="location.href='../php/logout.php'">Sair</button> <!-- Atualizado -->
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Seu Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
