<?php
include '../../model/event.php';
include '../../controller/eventcontroller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // The data will be added here after validation in JavaScript
    $event = new event( null, $_POST["titre"], $_POST["type"], $_POST["date"], $_POST["adresse"], $_POST["description"]);
    $eventC = new eventcontroller();
    $eventC->addevent($event);
    header('Location:eventList.php');
    exit();
}

require_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <script>
        // JavaScript validation function
        function validateForm() {
            // Retrieve the field values
            var titre = document.forms["eventForm"]["titre"].value;
            var type = document.forms["eventForm"]["type"].value;
            var date = document.forms["eventForm"]["date"].value;
            var adresse = document.forms["eventForm"]["adresse"].value;
            var description = document.forms["eventForm"]["description"].value;
            
            // Check if all fields are filled
            if (titre == "" || type == "" || date == "" || adresse == "" || description == "") {
                alert("Tous les champs sont obligatoires.");
                return false;
            }

            // Check the title length (maximum 255 characters)
            if (titre.length > 255) {
                alert("Le titre ne doit pas depasser 255 caracteres.");
                return false;
            }

            // Check the description length (maximum 1000 characters)
            if (description.length > 1000) {
                alert("La description ne doit pas dépasser 1000 caractères.");
                return false;
            }

            // Check the date format (YYYY-MM-DD)
            var datePattern = /^\d{4}-\d{2}-\d{2}$/;
            if (!date.match(datePattern)) {
                alert("Date invalide. Le format doit etre YYYY-MM-DD.");
                return false;
            }

            return true; // Allow form submission if all inputs are valid
        }
    </script>
</head>

<body>
    <form name="eventForm" method="post" action="" onsubmit="return validateForm()">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" value="<?= isset($_POST['titre']) ? ($_POST['titre']) : '' ?>">

        <label for="type">Type:</label>
        <input type="text" name="type" value="<?= isset($_POST['type']) ? ($_POST['type']) : '' ?>">

        <label for="date">Date:</label>
        <input type="date" name="date" value="<?= isset($_POST['date']) ? ($_POST['date']) : '' ?>">

        <label for="adresse">Adresse:</label>
        <input type="text" name="adresse" value="<?= isset($_POST['adresse']) ?($_POST['adresse']) : '' ?>">

        <label for="description">Description:</label>
        <textarea class="form-control form-control-user" id="description" name="description"><?= isset($_POST['description']) ? ($_POST['description']) : '' ?></textarea><br>

        <input type="submit" value="save">
    </form>
</body>

</html>
