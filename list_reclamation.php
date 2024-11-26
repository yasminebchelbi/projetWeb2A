<?php
include 'ReclamationController.php';
$controller = new ReclamationController();
$reclamations = $controller->getReclamationList();

foreach ($reclamations as $reclamation) {
    echo "<div class='reclamation'>";
    echo "<h3>Type : {$reclamation['typeReclamation']}</h3>";
    echo "<p><strong>ID Utilisateur :</strong> {$reclamation['idUser']}</p>";
    echo "<p><strong>Contenu :</strong> {$reclamation['contenuReclamation']}</p>";
    echo "<a href='deleteReclamation.php?idReclamation={$reclamation['idReclamation']}'>Supprimer</a>";
    echo "</div>";
}
?>
