<?php
require_once 'db.php';

function exibirTabela($pdo, $tabela, $titulo) {
    echo "<h2>$titulo</h2>";
    $query = $pdo->query("SELECT * FROM $tabela");
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($dados) > 0) {
        echo "<table border='1' cellpadding='8' cellspacing='0'>";
        // Cabeçalho
        echo "<tr>";
        foreach (array_keys($dados[0]) as $coluna) {
            echo "<th>" . htmlspecialchars($coluna) . "</th>";
        }
        echo "</tr>";
        // Dados
        foreach ($dados as $linha) {
            echo "<tr>";
            foreach ($linha as $valor) {
                echo "<td>" . htmlspecialchars($valor) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nenhum dado encontrado na tabela $tabela.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações do Sistema Rural</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Informações do Sistema Rural</h1>

    <?php
    // Exibindo tabelas
    exibirTabela($pdo, 'papel', 'Papéis');
    exibirTabela($pdo, 'usuario', 'Usuários');
    exibirTabela($pdo, 'usuario_papel', 'Associação Usuários e Papéis');
    exibirTabela($pdo, 'propriedade_rural', 'Propriedades Rurais');
    exibirTabela($pdo, 'usuario_propriedade', 'Associação Usuários e Propriedades');
    exibirTabela($pdo, 'animal', 'Animais');
    exibirTabela($pdo, 'bovino', 'Bovinos');
    exibirTabela($pdo, 'equino', 'Equinos');
    exibirTabela($pdo, 'caprino', 'Caprinos');
    exibirTabela($pdo, 'evento_animal', 'Eventos dos Animais');
    ?>
</body>
</html>
