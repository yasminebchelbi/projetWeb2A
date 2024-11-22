<?php
include "../model/forms/Article.php"; // Inclure le modèle Article
include "../controller/ArticleController.php"; // Inclure le contrôleur ArticleController
$article = null;
$error = "";

// Création d'une instance du contrôleur
$articleController = new ArticleController();

// Vérification des champs dans $_POST lors de la soumission du formulaire
if (
    isset($_POST["title"]) && isset($_POST["date"]) && isset($_POST["category"]) && isset($_POST["content"])
) {
    // Vérification que les champs ne sont pas vides
    if (
        !empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["category"]) && !empty($_POST["content"])
    ) {
        // Création d'un objet Article avec les données du formulaire
        $article = new Article(
            $_POST['date'], // L'ID est null car il sera généré par la base de données
            $_POST['title'],
            $_POST['category'],
            $_POST['content'],
            null
        );

        // Appel de la méthode addArticle du contrôleur pour ajouter l'article
        $articleController->addArticle($article);

        // Redirection vers la liste des articles après l'ajout
        header('Location: ArticleList.php');
        exit(); // S'assurer qu'aucun autre code n'est exécuté après la redirection
    } else {
        // Message d'erreur si des informations manquent
        $error = "Informations manquantes";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>

<body>

    <h1>Ajouter un nouvel article</h1>

    <!-- Afficher l'erreur s'il y en a une -->
    <?php if (!empty($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulaire d'ajout d'article -->
    <form id="article" action="" method="POST">
        <label for="title">Titre:</label>
        <input class="form-control" type="text" id="title" name="title" required><br>

        <label for="date">Date:</label>
        <input class="form-control" type="date" id="date" name="date" required><br>

        <label for="category">Catégorie:</label>
        <input class="form-control" type="text" id="category" name="category" required><br>

        <label for="content">Contenu:</label><br>
        <textarea class="form-control" id="content" name="content" rows="5" cols="40" required></textarea><br>

        <input type="submit" value="Ajouter l'article">
    </form>

    <br>
    <a href="ArticleList.php">Retour à la liste des articles</a>

</body>

</html>
