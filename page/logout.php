<?php
require_once '../classe/user.php';

session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $user->logout();
}
$filename = $_SESSION['actual_page'];
if ($filename == 'profile.php') {
    $filename = '../index.php';
}
header("Location: $filename");
exit();
?>