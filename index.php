<?php
require_once 'classe/user.php';
require_once './html-element/header.php';
require_once './html-element/footer.php';
require_once './html-element/logState.php';

session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="./assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="./assets/css/index.css">

        <title>Gestionnaire de fichier</title>
    </head>

    <body>
        <?php echo generateHeaderIndex(); ?>

        <section class="main-container">

            <?php echo generateLogStateIndex(); ?>

            <h1>Bienvenue sur votre gestionnaire de fichier</h1>
            <p>Inscrivez-vous, connectez-vous, téléchargez vos fichiers et gérez-les comme vous le souhaitez.</p>

            <div class="buttons">
                <a href="pages/register.php" class="button">Inscription</a>

                <a href="pages/file_manager.php" class="button">Gestion des fichiers</a>
                
                <a href="pages/login.php" class="button">Connexion</a>
            </div>
        </section>

        <?php echo generateFooter(); ?>
    </body>
</html>