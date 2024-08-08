
<?php
require_once 'data_base.php'; // Inclui o arquivo de configuração

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar e escapar dados do formulário
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensagem = $conn->real_escape_string($_POST['mensagem']);

    // Preparar e executar a inserção
    $sql = "INSERT INTO contatos (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Dados do Formulário:</h2>";
        echo "Nome: " . htmlspecialchars($nome) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Mensagem: " . htmlspecialchars($mensagem) . "<br>";
        echo "<p>Dados salvos com sucesso!</p>";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
