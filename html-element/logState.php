<?php
function generateLogState() {
    $logState = '';
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->getLogState() == true) {
            $logState .= '<a href="../treatment/logout.php" class="logout-button">Log out</a>';
            $logState .= '<p class="logState">Connecté</p>';
            $_SESSION['actual_page'] = basename($_SERVER['REQUEST_URI']);
        } else {
            $logState .= '<p class="logState">Déconnecté</p>';
        }
    } else {
        $logState .= '<p class="logState">Déconnecté</p>';
    }

    return $logState;
}

function generateLogStateIndex() {
    $logState = '';
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if ($user->getLogState() == true) {
            $logState .= '<a href="treatment/logout.php" class="logout-button">Log out</a>';
            $logState .= '<p class="logState">Connecté</p>';
            $_SESSION['actual_page'] = basename($_SERVER['REQUEST_URI']);
        } else {
            $logState .= '<p class="logState">Déconnecté</p>';
        }
    } else {
        $logState .= '<p class="logState">Déconnecté</p>';
    }

    return $logState;
}
?>