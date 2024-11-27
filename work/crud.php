<?php
include 'index.html';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $action = $data['action'] ?? null;
    $itemName = $data['item_name'] ?? '';
    $itemId = $data['item_id'] ?? null;
    

    try {
        if ($action === 'add') {
            // Criar um novo item
            $stmt = $conn->prepare("INSERT INTO items (name) VALUES (:name)");
            $stmt->bindParam(':name', $itemName);
            $stmt->execute();
            echo json_encode(["message" => "Item adicionado com sucesso!"]);
        } elseif ($action === 'update' && $itemId) {
            // Atualizar um item existente
            $stmt = $conn->prepare("UPDATE items SET name = :name WHERE id = :id");
            $stmt->bindParam(':name', $itemName);
            $stmt->bindParam(':id', $itemId);
            $stmt->execute();
            echo json_encode(["message" => "Item atualizado com sucesso!"]);
        } elseif ($action === 'delete' && $itemId) {
            // Deletar um item
            $stmt = $conn->prepare("DELETE FROM items WHERE id = :id");
            $stmt->bindParam(':id', $itemId);
            $stmt->execute();
            echo json_encode(["message" => "Item deletado com sucesso!"]);
        } else {
            echo json_encode(["error" => "Ação inválida ou dados ausentes."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Erro ao executar ação: " . $e->getMessage()]);
    }
}
?>
