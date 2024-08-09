<?php
session_start(); // Inicia a sessão

require_once '../php/data_base.php'; // Inclui o arquivo de configuração

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar se os dados foram enviados
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        // Coletar e escapar dados do formulário
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $_POST['senha'];

        // Consultar o banco de dados para verificar credenciais
        $sql = "SELECT nome, senha FROM contatos WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Verificar a senha
            $row = $result->fetch_assoc();
            if (password_verify($senha, $row['senha'])) {
                // Login bem-sucedido, armazenar o nome e o e-mail na sessão
                $_SESSION['usuario'] = $row['nome'];
                $_SESSION['email'] = $email;

                $response['status'] = 'success';
                $response['message'] = 'Login bem-sucedido!';

                // Enviar resposta JSON e redirecionar para a tela inicial
                echo json_encode($response);
                exit();
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Senha incorreta.';
                echo json_encode($response);
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Email não encontrado.';
            echo json_encode($response);
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Dados do formulário ausentes.';
        echo json_encode($response);
    }

    // Fechar a conexão
    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de requisição inválido.';
    echo json_encode($response);
}
?>
