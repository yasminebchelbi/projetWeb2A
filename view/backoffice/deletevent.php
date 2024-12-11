<?php
include '../../controller/eventcontroller.php';
$eventC = new eventcontroller();

// recuperer l'id passe dans l'URL en utilisant la methode par defaut $_GET["id"]
$eventC->deletevent($_GET["idEvent"]);
//une fois la suppression est faite une redirection vers la liste des event ce fait
header('Location:eventList.php');

?>