<?php
$servername = "localhost";
$username = "root"; // Usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "deivisnan"; // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
