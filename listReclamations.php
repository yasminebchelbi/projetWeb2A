<?php
include '../controller/ReclamationController.php';
$controller = new ReclamationController();
$reclamations = $controller->getReclamations();

foreach ($reclamations as $reclamation) {
    echo "<div class='reclamation'>";
    echo "<h3>Type de Commande : {$reclamation['typeCommande']}</h3>";
    echo "<p><strong>Nom :</strong> {$reclamation['nom']}</p>";
    echo "<p><strong>Email :</strong> {$reclamation['email']}</p>";
    echo "<p><strong>ID Commande :</strong> {$reclamation['idCommande']}</p>";
    echo "<p><strong>Contenu :</strong> {$reclamation['contenuReclamation']}</p>";
    echo "<a href='../public/deleteReclamation.php?idReclamation={$reclamation['idReclamation']}'>Supprimer</a>";
    echo "</div>";
}
?>
