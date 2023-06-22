<?php
require_once '../classe/database.php';

$db = new Database();

// Supprimer un fichier
if (isset($_GET['id'])) {
    $fileIdToDelete = $_GET['id'];
    echo $fileIdToDelete;
    $getFileNameQuery = "SELECT name, type FROM files where id = :id";
    $stmt = $db->pdo->prepare($getFileNameQuery);
    $stmt->bindParam(':id', $fileIdToDelete);
    $stmt->execute();

    $result = $stmt->fetch();

    if ($result) {
        $fileName = $result['name'];
        $fileType = $result['type'];
    }

    $filePath = '../file_storage/' . $fileName . $fileType;

    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $deleteQuery = "DELETE FROM files WHERE id = :id";
    $deleteStatement = $db->pdo->prepare($deleteQuery);
    $deleteStatement->bindParam(':id', $fileIdToDelete);
    $deleteStatement->execute();
}

header("Location: ../pages/file_manager.php")
?>