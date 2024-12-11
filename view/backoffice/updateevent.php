<?php
include "../../model/event.php";
include "../../controller/eventcontroller.php";
$event = null;
$error = "";
// create an instance of the controller
$eventC = new eventcontroller();

// Check if the required POST fields are set
if (
    isset($_POST["titre"]) && isset($_POST["type"]) && isset($_POST["date"]) && 
    isset($_POST["adresse"]) && isset($_POST["description"])
) {
    // Check if the POST fields are not empty
    if (
        !empty($_POST["titre"]) && !empty($_POST["type"]) && !empty($_POST["date"]) &&
        !empty($_POST["adresse"]) && !empty($_POST["description"])
    ) {
        // Create a object with the updated values
        $event = new event(
            $_POST['idEvent'],
            $_POST['titre'],
            $_POST['type'],
            $_POST['date'],
            $_POST['adresse'],
            $_POST['description']
        );
        // Call the updateevent method to update the event
        $eventC->updateevent($event, $_POST['idEvent']);
        // Redirect to the event list page after updating
        header('Location: eventList.php');
    } else {
        // Error message if some fields are missing
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Event</title>
</head>

<body>

    <?php
    // Check if event ID is set in the POST request
    if (isset($_POST['idEvent'])) {
        // Retrieve the event by its ID for updating
        $event = $eventC->geteventById($_POST['idEvent']);
    ?>
        <!-- Populate the form with the existing product details -->
        <form id="product" action="" method="POST">
            <label for="idEvent">Event ID:</label>
            <input class="form-control form-control-user" type="text" idEvent="idEvent" name="idEvent" readonly value="<?php echo $_POST['idEvent'] ?>"><br>

            <label for="titre">Event Title:</label>
            <input class="form-control form-control-user" type="text" id="titre" name="titre" value="<?php echo $event['titre'] ?>"><br>

            <label for="type">Type:</label>
            <input class="form-control form-control-user" type="text" id="type" name="type" value="<?php echo $event['type'] ?>"><br>

            <label for="date">Date:</label>
            <input class="form-control form-control-user" type="date" id="date" name="date" value="<?php echo $event['date'] ?>"><br>

            <label for="adresse">Address:</label>
            <input class="form-control form-control-user" type="text" id="adresse" name="adresse" value="<?php echo $event['adresse'] ?>"><br>

            <label for="description">Description:</label>
            <textarea class="form-control form-control-user" id="description" name="description"><?php echo $event['description'] ?></textarea><br>

            <input type="submit" value="Save">
        </form>
    <?php
    }
    ?>
    
    <?php if ($error != ""): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
</body>

</html>