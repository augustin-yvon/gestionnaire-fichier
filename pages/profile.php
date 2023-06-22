<?php
require_once '../classe/user.php';
require_once '../classe/database.php';
require_once '../html-element/header.php';
require_once '../html-element/footer.php';
require_once '../html-element/logState.php';

session_start();

$db = new Database();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $userID = $user->getId();
    if ($user->getLogState() == false) {
        $_SESSION['redirect-page'] = basename($_SERVER['REQUEST_URI']);
        header("Location: login.php");
        exit();
    }
}else {
    header("Location: login.php");
    exit();
}

// Traitement de la requête de modification du profil
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données envoyées par le formulaire
    $newUsername = htmlspecialchars($_POST['username']);
    $newPassword = htmlspecialchars($_POST['password']);

    // Mettre à jour les données dans la base de données
    $updateQuery = "UPDATE user SET username = ?, password = ? WHERE id = ?";

    $stmt = $db->pdo->prepare($updateQuery);

    $stmt->bindParam(1, $newUsername);
    $stmt->bindParam(2, $newPassword);
    $stmt->bindParam(3, $userID);

    $stmt->execute();

    exit;
}

// Récupérer les informations de l'utilisateur actuel à partir de la base de données
$getUsernameByIdQuery = "SELECT username, password FROM user WHERE id = ?";
$stmt = $db->pdo->prepare($getUsernameByIdQuery);
$stmt->bindParam(1, $userID);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $currentUsername = $result['username'];
    $currentPassword = $result['password'];
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="../assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="../assets/css/profile.css">

        <title>Gestionnaire de fichier</title>
    </head>

    <body>
        <?php echo generateHeader(); ?>

        <section class="main-container">

            <?php echo generateLogState(); ?>
            
            <div class="container">
                <form id="profile-form" method="post" action="">
                    <div class="input-box">
                        <img src="../assets/img/username.png" alt="username icon" title="username">
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $currentUsername; ?>" required>
                    </div>

                    <div class="input-box">
                        <img src="../assets/img/password.png" alt="password icon" title="password">
                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $currentPassword; ?>" required>
                    </div>

                    <button type="button" id="toggle-password">Show</button>

                    <input type="submit" value="Edit">

                    <?php if (isset($error)) : ?>
                        <p class="error"><?php echo $error; ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </section>

        <?php echo generateFooter(); ?>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../assets/js/profile.js"></script>
    </body>
</html>