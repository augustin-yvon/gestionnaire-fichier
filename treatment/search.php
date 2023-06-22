<?php
require_once '../classe/user.php';
require_once '../classe/database.php';

session_start();

$db = new Database();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userID = $user->getId();
}

$recherche = $_POST['search'];

$query = $db->pdo->prepare("SELECT * FROM files WHERE name LIKE :recherche");
$query->bindValue(':recherche', '%' . $recherche . '%');
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['search'] = $result;

header("Location: ../pages/file_manager.php")
?>