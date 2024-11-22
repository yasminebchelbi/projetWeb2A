<?php
include "../model/forms/Article.php";
include "../controller/ArticleController.php";
$article = null;
$error = "";

// Création d'une instance du contrôleur
$articleController = new ArticleController();

// Vérification des champs dans $_POST
if (
    isset($_POST["title"]) && isset($_POST["date"]) && isset($_POST["category"]) && isset($_POST["content"])
) {
    // Vérification que les champs ne sont pas vides
    if (
        !empty($_POST["title"]) && !empty($_POST["date"]) && !empty($_POST["category"]) && !empty($_POST["content"])
    ) {
        // Création d'un objet Article avec les données du formulaire
        $article = new Article(
           // L'ID est null car il sera généré par la base de données
            $_POST['title'],
            $_POST['category'],
            isset($_POST['content']) ? $_POST['content'] : '',
            $_POST['date'],
            null
        );
        // Mise à jour de l'article
        $articleController->updateArticle($article, $_POST['id']);
        // Redirection vers la liste des articles après la mise à jour
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
    <title>Modifier l'article</title>
</head>

<body>

    <?php
    // Vérification si un ID est passé en POST
    if (isset($_POST['id'])) {
        // Récupération de l'article à modifier par son ID
        $article = $articleController->getArticleById($_POST['id']);
    ?>
        <!-- Formulaire de modification de l'article -->
        <form id="article" action="" method="POST">
            <label for="id">ID Article:</label>
            <input class="form-control" type="text" id="id" name="id" readonly value="<?php echo $_POST['id'] ?>"><br>

            <label for="title">Titre:</label>
           <input class="form-control" type="text" id="title" name="title" value="<?php echo isset($article) ? htmlspecialchars($article['title']) : '' ?>"><br>

           <label for="category">Catégorie:</label>
            <input class="form-control" type="text" id="category" name="category" value="<?php echo isset($article) ? htmlspecialchars($article['category']) : '' ?>"><br>

            <label for="date">Date:</label>
            <input class="form-control" type="date" id="date" name="date" value="<?php echo isset($article) ? htmlspecialchars($article['date']) : '' ?>"><br>
           
           
            <label for="content">Contenu:</label><br>
            <textarea class="form-control" id="content" name="content" rows="5" cols="40"><?php echo isset($article) ? htmlspecialchars($article['content']) : '' ?></textarea><br>

            <input type="submit" value="Enregistrer">
        </form>
    <?php
    }
    ?>

</body>

</html>


