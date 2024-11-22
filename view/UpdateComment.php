<?php
// Inclusion des fichiers nécessaires
include "../Model/Comment.php";
include "../Controller/CommentController.php";

$comment = null;
$error = "";

// Créer une instance du contrôleur
$commentController = new CommentController();

// Vérifier si les champs sont définis et non vides
if (
    isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["comment"])
) {
    if (
        !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["comment"])
    ) {
        // Créer un objet Comment avec les nouvelles valeurs
        $comment = new Comment(
            null,
            $_POST['name'],
            $_POST['email'],
            $_POST['comment']
        );
        // Appeler la fonction updateComment du contrôleur
        $commentController->updateComment($comment, $_POST['id']);
        // Rediriger vers la liste des commentaires après la mise à jour
        header('Location: commentList.php');
    } else {
        // Message d'erreur si un champ est vide
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Comment</title>
</head>

<body>

    <?php
    // Récupérer l'ID du commentaire à partir de la méthode POST
    if (isset($_POST['id'])) {
        // Récupérer les informations du commentaire à mettre à jour
        $comment = $commentController->getCommentById($_POST['id']);
    ?>
        <!-- Formulaire de mise à jour du commentaire -->
        <form id="comment" action="" method="POST">
            <label for="id">ID Comment:</label>
            <input class="form-control form-control-user" type="text" id="id" name="id" readonly value="<?php echo $_POST['id']; ?>"><br>

            <label for="name">Name:</label>
            <input class="form-control form-control-user" type="text" id="name" name="name" value="<?php echo $comment['name']; ?>"><br>

            <label for="email">Email:</label>
            <input class="form-control form-control-user" type="text" id="email" name="email" value="<?php echo $comment['email']; ?>"><br>

            <label for="comment">Comment:</label>
            <textarea class="form-control form-control-user" id="comment" name="comment"><?php echo $comment['comment']; ?></textarea><br>

            <input type="submit" value="Save">
        </form>
    <?php
    }
    ?>

</body>

</html>
