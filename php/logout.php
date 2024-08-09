<?php
session_start(); // Inicia a sessão

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Se a sessão estiver sendo mantida em um cookie, exclua o cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destrua a sessão
session_destroy();

// Redirecionar para a página de login
header("Location: ../html/login.html");
exit();
?>
