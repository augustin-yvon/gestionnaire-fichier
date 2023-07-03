<?php
function generateHeader() {
    $header = '<header>';
    $header .= '<div class="header-content">';

    $header .= '<a href="file_manager.php" class="original-color"><img  src="../assets/img/gestionnaire-fichier.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="file_manager.php" class="hover-color"><img  src="../assets/img/gestionnaire-fichier-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="register.php" class="original-color"><img  src="../assets/img/inscription.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="register.php" class="hover-color"><img  src="../assets/img/inscription-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="../index.php" class="original-color"><img  src="../assets/img/accueil.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="../index.php" class="hover-color"><img  src="../assets/img/accueil-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="login.php" class="original-color"><img  src="../assets/img/connexion.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="login.php" class="hover-color"><img  src="../assets/img/connexion-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
   
    $header .= '<a href="profile.php" class="original-color"><img  src="../assets/img/profil.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="profile.php" class="hover-color"><img  src="../assets/img/profil-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';

    $header .= '</div>';
    $header .= '<script src="../assets/js/main.js"></script>';
    $header .= '</header>';

    return $header;
}

function generateHeaderIndex() {
    $header = '<header>';
    $header .= '<div class="header-content">';

    $header .= '<a href="pages/file_manager.php" class="original-color"><img  src="assets/img/gestionnaire-fichier.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="pages/file_manager.php" class="hover-color"><img  src="assets/img/gestionnaire-fichier-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="pages/register.php" class="original-color"><img  src="assets/img/inscription.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="pages/register.php" class="hover-color"><img  src="assets/img/inscription-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="index.php" class="original-color"><img  src="assets/img/accueil.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="index.php" class="hover-color"><img  src="assets/img/accueil-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    
    $header .= '<a href="pages/login.php" class="original-color"><img  src="assets/img/connexion.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="pages/login.php" class="hover-color"><img  src="assets/img/connexion-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
   
    $header .= '<a href="pages/profile.php" class="original-color"><img  src="assets/img/profil.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';
    $header .= '<a href="pages/profile.php" class="hover-color"><img  src="assets/img/profil-orange.png" alt="gestionnaire de fichier" title="Gestionnaire de fichier"></a>';

    $header .= '</div>';
    $header .= '<script src="assets/js/main.js"></script>'; 
    $header .= '</header>';

    return $header;
}
?>