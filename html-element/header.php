<?php
function generateHeader() {
    $header = '<header>';
    $header .= '<div class="header-content">';

    $header .= '<img id="original-color-g" class="original-color" onclick="location.href=\'file_manager.php\'" src="../assets/img/gestionnaire-fichier.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier">';
    $header .= '<img id="hover-color-g" class="hover-color" onclick="location.href=\'file_manager.php\'" src="../assets/img/gestionnaire-fichier-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier">';
    
    $header .= '<img id="original-color-i" class="original-color" onclick="location.href=\'register.php\'" src="../assets/img/inscription.png" alt="inscription" title="Inscription">';
    $header .= '<img id="hover-color-i" class="hover-color" onclick="location.href=\'register.php\'" src="../assets/img/inscription-orange.png" alt="inscription" title="Inscription">';
    
    $header .= '<img id="original-color-i" class="original-color" onclick="location.href=\'../index.php\'" src="../assets/img/accueil.png" alt="inscription" title="Inscription">';
    $header .= '<img id="hover-color-i" class="hover-color" onclick="location.href=\'../index.php\'" src="../assets/img/accueil-orange.png" alt="inscription" title="Inscription">';
    
    $header .= '<img id="original-color-c" class="original-color" onclick="location.href=\'login.php\'" src="../assets/img/connexion.png" alt="connexion" title="Connexion">';
    $header .= '<img id="hover-color-c" class="hover-color" onclick="location.href=\'login.php\'" src="../assets/img/connexion-orange.png" alt="connexion" title="Connexion">';
    
    $header .= '<img id="original-color-p" class="original-color" onclick="location.href=\'profile.php\'" src="../assets/img/profil.png" alt="profil" title="Profil">';
    $header .= '<img id="hover-color-p" class="hover-color" onclick="location.href=\'profile.php\'" src="../assets/img/profil-orange.png" alt="profil" title="Profil">';
    
    $header .= '</div>';
    $header .= '<script src="../assets/js/main.js"></script>';
    $header .= '</header>';

    return $header;
}

function generateHeaderIndex() {
    $header = '<header>';
    $header .= '<div class="header-content">';
    
    $header .= '<img id="original-color-g" class="original-color" onclick="location.href=\'pages/file_manager.php\'" src="assets/img/gestionnaire-fichier.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier">';
    $header .= '<img id="hover-color-g" class="hover-color" onclick="location.href=\'pages/file_manager.php\'" src="assets/img/gestionnaire-fichier-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier">';
    
    $header .= '<img id="original-color-i" class="original-color" onclick="location.href=\'pages/register.php\'" src="assets/img/inscription.png" alt="inscription" title="Inscription">';
    $header .= '<img id="hover-color-i" class="hover-color" onclick="location.href=\'pages/register.php\'" src="assets/img/inscription-orange.png" alt="inscription" title="Inscription">';
    
    $header .= '<img id="original-color-i" class="original-color" onclick="location.href=\'index.php\'" src="assets/img/accueil.png" alt="inscription" title="Inscription">';
    $header .= '<img id="hover-color-i" class="hover-color" onclick="location.href=\'index.php\'" src="assets/img/accueil-orange.png" alt="inscription" title="Inscription">';

    $header .= '<img id="original-color-c" class="original-color" onclick="location.href=\'pages/login.php\'" src="assets/img/connexion.png" alt="connexion" title="Connexion">';
    $header .= '<img id="hover-color-c" class="hover-color" onclick="location.href=\'pages/login.php\'" src="assets/img/connexion-orange.png" alt="connexion" title="Connexion">';
    
    $header .= '<img id="original-color-p" class="original-color" onclick="location.href=\'pages/profile.php\'" src="assets/img/profil.png" alt="profil" title="Profil">';
    $header .= '<img id="hover-color-p" class="hover-color" onclick="location.href=\'pages/profile.php\'" src="assets/img/profil-orange.png" alt="profil" title="Profil">';
    
    $header .= '</div>';
    $header .= '<script src="assets/js/main.js"></script>';
    $header .= '</header>';

    return $header;
}
?>