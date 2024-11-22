<?php
// Include the ArticleController to handle article-related operations
include '../controller/ArticleController.php';

// Create an instance of the ArticleController
$articleController = new ArticleController();

// Retrieve the 'id' passed in the URL using $_GET method
$articleId = $_GET["id"];

// Call the deleteArticle method from the controller to delete the article by its ID
$articleController->DeleteArticle($articleId);

// After deletion, redirect to the list of articles (articleList.php)
header('Location: ArticleList.php');
exit(); // Ensure the script stops executing after the redirect
?>
