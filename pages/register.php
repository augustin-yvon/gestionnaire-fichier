<?php
require_once '../classe/user.php';
require_once '../classe/database.php';
require_once '../html-element/header.php';
require_once '../html-element/footer.php';
require_once '../html-element/logState.php';

session_start();

$db = new Database();

$errors = array();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $confirmPassword = htmlspecialchars($_POST["confirm_password"]);

    // Vérifier si le mot de passe respecte les critères
    $passwordPattern = "/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
    if (!preg_match($passwordPattern, $password)) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères, une majuscule, un chiffre et un caractère spécial.";
    }

    // Vérifier si les mots de passe correspondent
    if ($password !== $confirmPassword) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier si le username est déjà utilisé
    if ($db->validateLogin($username)) {
        $errors[] = "Ce username est déjà utilisé. Veuillez en choisir un autre.";
    }

    // Insérer les données dans la base de données si aucune erreur n'est survenue
    if (empty($errors)) {
        if ($db->register($username, $password)) {
            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="../assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="../assets/css/register.css">

        <title>Gestionnaire de fichier</title>
    </head>

    <body>
        <?php echo generateHeader(); ?>

        <section class="main-container">

            <?php echo generateLogState(); ?>

            <div class="container">
                <form method="post" action="">
                    <div class="input-box">
                        <img src="../assets/img/username.png" alt="username icon" title="username">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>

                    <div class="input-box">
                        <img src="../assets/img/password.png" alt="password icon" title="password">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="input-box">
                        <img src="../assets/img/password.png" alt="password icon" title="confirm password">
                        <input type="password"name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    
                    <?php if (!empty($errors)) : ?>
                        <div class="error">
                            <?php foreach ($errors as $error) : ?>
                                <p><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <input type="submit" value="Sign up">


                    <p>Déjà inscrit ? <a href="login.php">Connectez-vous</a></p>
                </form>
            </div>
        </section>

        <?php echo generateFooter(); ?>
    </body>
</html>