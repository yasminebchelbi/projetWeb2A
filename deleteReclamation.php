<?php
include '../controller/ReclamationController.php';

if (isset($_GET['idReclamation'])) {
    $controller = new ReclamationController();
    $controller->deleteReclamation($_GET['idReclamation']);
    header('Location: index.html');
}
?>
