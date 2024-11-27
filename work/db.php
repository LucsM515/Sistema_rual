<?php
$host = "localhost";
$dbname = "aplicacao_internet_teste2";
$username = "root";
$password = "12345";

try {
    // Conexão ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . htmlspecialchars($e->getMessage()));
}
?>
