<?php
require_once '../classe/user.php';

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user->logout();
}
$fileName = $_SESSION['actual_page'];
if ($fileName == 'profile.php' || $fileName == 'file_manager.php' || $fileName == 'index.php') {
    $fileName = '../index.php';
}else{
    $fileName = "../pages/" . $fileName;
}
header("Location: $fileName");
exit();
?>