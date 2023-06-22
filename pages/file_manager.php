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

// Télécharger un fichier
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
        $fullFileName = $_FILES['fichier']['name'];
        $fileName = pathinfo($fullFileName, PATHINFO_FILENAME); // Obtenir le nom du fichier sans l'extension
        $fileType = "." . pathinfo($fullFileName, PATHINFO_EXTENSION); // Obtenir l'extension du fichier avec l'affichage suivant : .extension
        $fileSize = $_FILES['fichier']['size'] / 1000 . "ko";
        $tmpFilePath = $_FILES['fichier']['tmp_name'];
        
        // Définition de la limite de taille maximale
        $maxFileSize = 2 * 1024 * 1024; // 2 Mo

        if ($_FILES['fichier']['size'] > $maxFileSize) {
            $error = "Fichier trop volumineux !";
        } else {
            
            // $checkFileNameQuery = "SELECT id FROM files WHERE name = :fileName";
            // $stmt = $db->pdo->prepare($checkFileNameQuery);
            // $stmt->bindParam(':fileName', $fileName);
            // $stmt->execute();
            // if ($stmt->rowCount() > 0) {
            //     $error = "Ce nom est déjà utilisé !";
            // } else

            $destinationPath = "../file_storage/" . $fullFileName;
            if (!move_uploaded_file($tmpFilePath, $destinationPath)) {
                $error = "Une erreur est survenu lors du stockage du fichier";
            }
            
            $query = $db->pdo->prepare("INSERT INTO files (name, type, size, user_id) VALUES (?, ?, ?, ?)");
            $query->execute([$fileName, $fileType, $fileSize, $userID]);
    
            if(!$query->rowCount() > 0) {
                $error = "Une erreur est survenu lors du téléchargement du fichier";
            }else{
                header("Location: file_manager.php");
            }
        }
    } else {
        $error = "Fichier incompatible ou trop volumineux !";
    }
}

// Récupérer les fichiers depuis la base de données
$getAllFilesQuery = "SELECT * FROM files WHERE user_id = ? ORDER BY id DESC";
$statement = $db->pdo->prepare($getAllFilesQuery);
$statement->execute([$userID]);
$files = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" href="../assets/img/gestionnaire-fichier.png" />
        <link rel="stylesheet" href="../assets/css/file_manager.css">

        <title>Gestionnaire de fichier</title>
    </head>

    <body>
        <?php echo generateHeader(); ?>

        <section class="main-container">
            <?php echo generateLogState(); ?>

            <div class="upload-container">
                <h1>Téléchargez vos fichiers</h1>

                <p class="accept-files">Fichier accepté : pdf, txt, odt, jpg, jpeg, png</p>
                
                <form class="upload-form" action="" method="POST" enctype="multipart/form-data">
                    <input type="file" name="fichier" accept=".pdf, .txt, .odt, .jpg, .jpeg, .png">

                    <?php if (isset($error)) : ?>
                        <?php echo "<p class='error'>$error</p>"; ?>
                    <?php endif; ?>

                    <input type="submit" value="Télécharger">
                </form>
            </div>
            
            <div class="container">
                <div class="display-files"> 
                    <div class="file-container">
                        <?php
                            if (isset($_SESSION['search'])){
                                $search = $_SESSION['search'];

                                echo "<table>";
                                echo "<tr> <th>Nom</th> <th>Type</th> <th>Taille</th> <th colspan='2'>Action</th> </tr>";
                                foreach ($search as $file) {
                                    echo "<tr>";
                                        echo "<td>" . $file['name'] . "</td>";
                                        echo "<td>" . $file['type'] . "</td>";
                                        echo "<td>" . $file['size'] . "</td>";
                                        echo "<td><a class='delete' href='../treatment/delete.php?id=" . $file['id'] . "'>Supprimer</a></td>";
                                        echo "<td><a class='download' href='../file_storage/" . $file['name'] . $file['type'] . "' download>Télécharger</a></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }else{
                                // Afficher les fichiers dans un tableau HTML
                                echo "<table>";
                                echo "<tr> <th>Nom</th> <th>Type</th> <th>Taille</th> <th colspan='2'>Action</th> </tr>";
                                foreach ($files as $file) {
                                    echo "<tr>";
                                        echo "<td>" . $file['name'] . "</td>";
                                        echo "<td>" . $file['type'] . "</td>";
                                        echo "<td>" . $file['size'] . "</td>";
                                        echo "<td><a class='delete' href='../treatment/delete.php?id=" . $file['id'] . "'>Supprimer</a></td>";
                                        echo "<td><a class='download' href='../file_storage/" . $file['name'] . $file['type'] . "' download>Télécharger</a></td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                            unset($_SESSION['search']);
                        ?>
                    </div>
                </div>
                
                <div class="search-container">
                    <form class="search_form" action="../treatment/search.php" method="POST">
                        <input type="text" name="search" placeholder="Rechercher un fichier">
                        <input type="submit" value="Search">
                    </form>
                    
                    <a class="stop_search" href="file_manager.php">Arrêté la recherche</a>
                </div>
            </div>
        </section>

        <?php echo generateFooter(); ?>
    </body>
</html>