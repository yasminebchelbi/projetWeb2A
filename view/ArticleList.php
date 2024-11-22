<?php

include "../controller/ArticleController.php";

// Create an instance of ArticleController
$articleController = new ArticleController();

// Get the list of articles from the controller
$list = $articleController->ArticleList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article List</title>
</head>

<body>
    <a href="AddArticle.php">Add New Article</a>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Content</th>
            <th>Category</th>
            <th>Date</th>
        </tr>
        <?php
        // Loop through the list of articles and display them in the table
        foreach ($list as $article) {
        ?>
            <tr>
                <td><?= $article['ID']; ?></td>
                <td><?= $article['Title']; ?></td>
                <td><?= $article['Content']; ?></td>
                <td><?= $article['Category']; ?></td>
                <td><?= $article['date']; ?></td>
                <td><?= substr($article['Content'], 0, 50) . '...'; ?></td> <!-- Show a snippet of content -->
                <td>
                    <!-- Update button: sends a POST request to updateArticle.php with the article ID -->
                    <form method="POST" action="UpdateArticle.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $article['ID']; ?>" name="id">
                    </form>

                    <!-- Delete link: sends the article ID via GET to deleteArticle.php -->
                    <a href="DeleteArticle.php?id=<?= $article['ID']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
