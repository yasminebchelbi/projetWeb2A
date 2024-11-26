<?php
require '../Model/Reclamation.php';
require '../controller/ReclamationController.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $idCommande = $_POST['idCommande'];
    $typeCommande = $_POST['typeCommande'];
    $contenuReclamation = $_POST['contenuReclamation'];
    $reclamation = new Reclamation(null, $nom, $email, $idCommande, $typeCommande, $contenuReclamation);
    $controller = new ReclamationController();
    $controller->addReclamation($reclamation);
    header('Location: index.html');
    exit;
} else {
    echo "Méthode de requête non valide.";
}
?>
