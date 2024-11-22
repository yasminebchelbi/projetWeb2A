<?php
// Inclure le contrôleur des commentaires pour gérer les opérations liées aux commentaires
include '../controller/CommentController.php';

// Créer une instance du contrôleur des commentaires
$commentController = new CommentController();

// Récupérer l'ID du commentaire passé dans l'URL via $_GET
$commentId = $_GET["id"];

// Appeler la méthode deleteComment du contrôleur pour supprimer le commentaire par son ID
$commentController->deleteComment($commentId);

// Après la suppression, rediriger vers la liste des commentaires (CommentList.php)
header('Location: CommentList.php');
exit(); // Assurez-vous que le script s'arrête après la redirection
?>
