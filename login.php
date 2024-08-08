<?php
require_once 'data_base.php'; // Inclui o arquivo de configuração

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados foram enviados
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Coletar e escapar dados do formulário
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $_POST['senha'];

        // Consultar o banco de dados para verificar credenciais
        $sql = "SELECT senha FROM contatos WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Verificar a senha
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                echo "Login bem-sucedido!";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Email não encontrado.";
        }
    } else {
        echo "Dados do formulário ausentes.";
    }

    // Fechar a conexão
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>

