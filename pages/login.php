<?php
require_once '../classe/user.php';
require_once '../classe/database.php';
require_once '../html-element/header.php';
require_once '../html-element/footer.php';
require_once '../html-element/logState.php';

session_start();

$db = new Database();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    // Vérifier les informations de connexion dans la base de données
    $checkInfoQuery = "SELECT id FROM user WHERE username = ? AND password = ?";
    $stmt = $db->pdo->prepare($checkInfoQuery);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Créer l'objet utilisateur
        $user = new User($username, $password);

        $id = $db->getId($username);

        // Ajouter l'id à l'objet utilisateur
        if ($id !== false) {
            $user->setId($id);
        }

        // Mettre l'utilisateur à l'état connecté
        $user->login();
        
        $_SESSION["user"] = $user;

        if (isset($_SESSION['redirect-page'])){
            $redirect_page = $_SESSION['redirect-page'];
            
            header("Location: $redirect_page");
            exit();
        }else{
            header("Location: profile.php");
            exit();
        }
    } else {
        $error = "Username ou mot de passe incorrect.";
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
        <link rel="stylesheet" href="../assets/css/login.css">

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

                    <input type="submit" value="Log in">

                    <?php if (isset($error)) : ?>
                        <p class="error"><?php echo $error; ?></p>
                    <?php endif; ?>

                    <p>Pas encore inscrit ? <a href="register.php">Inscrivez-vous</a></p>
                </form>
            </div>
        </section>

        <?php echo generateFooter(); ?>
    </body>
</html>