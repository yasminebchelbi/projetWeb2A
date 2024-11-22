<?php
// Inclure le modèle Comment
include "../model/forms/Comment.php";
// Inclure le contrôleur CommentController
include "../controller/CommentController.php";

$comment = null;
$error = "";

// Création d'une instance du contrôleur CommentController
$commentController = new CommentController();

// Vérification des champs dans $_POST lors de la soumission du formulaire
if (
    isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["comment"])
) {
    // Vérification que les champs ne sont pas vides
    if (
        !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["comment"])
    ) {
        // Création d'un objet Comment avec les données du formulaire
        $comment = new Comment(
            null, // L'ID est null car il sera généré par la base de données
            $_POST['name'],
            $_POST['email'],
            $_POST['comment']
        );

        // Appel de la méthode addComment du contrôleur pour ajouter le commentaire
        $commentController->addComment($comment);

        // Redirection vers la liste des commentaires après l'ajout
        header('Location: CommentList.php');
        exit(); // S'assurer qu'aucun autre code n'est exécuté après la redirection
    } else {
        // Message d'erreur si des informations manquent
        $error = "Informations manquantes";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
    <script type="text/javascript">
        // Fonction de validation du formulaire
        function validateForm() {
            // Récupérer les valeurs des champs
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var comment = document.getElementById("comment").value;

            // Vérification des champs
            if (name == "") {
                alert("Le nom est requis.");
                return false;
            }

            if (email == "") {
                alert("L'email est requis.");
                return false;
            }

            // Vérification du format de l'email avec une expression régulière
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(email)) {
                alert("Veuillez entrer un email valide.");
                return false;
            }

            if (comment == "") {
                alert("Le commentaire est requis.");
                return false;
            }

            // Si tous les champs sont valides, on retourne true pour soumettre le formulaire
            return true;
        }
    </script>
</head>

<body>

    <h1>Add a Comment</h1>

    <!-- Formulaire pour ajouter un commentaire -->
    <form method="POST" action="" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" required></textarea><br>

        <input type="submit" value="Add Comment">
    </form>

    <!-- Afficher un message d'erreur si des informations sont manquantes -->
    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>$error</p>";
    }
    ?>

</body>

</html>

