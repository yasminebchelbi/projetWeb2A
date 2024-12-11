<?php


include "../../model/reservation.php";
include "../../controller/reservationcontroller.php";
$reservation = null;
$error = "";
// create an instance of the controller
$reservationC = new reservationcontroller();

// Check if the required POST fields are set
if (
    isset($_POST["idReserv"]) && isset($_POST["idUser"]) && isset($_POST["dateReserv"]) && 
    isset($_POST["nbrPlaces"]) && isset($_POST["idEvent"])
) {
    // Check if the POST fields are not empty
    if (
        !empty($_POST["idReserv"]) && !empty($_POST["idUser"]) && !empty($_POST["dateReserv"]) &&
        !empty($_POST["nbrPlaces"]) && !empty($_POST["idEvent"])
    ) {
        // Create an object with the updated values
        $reservation = new reservation(
            $_POST['idReserv'],
            $_POST['idUser'],
            $_POST['dateReserv'],
            $_POST['nbrPlaces'],
            $_POST['idEvent']
        );
        
        // Call the updatereservation method to update the reservation
        $reservationC->updatereservation($reservation, $_POST['idReserv']);
        // Redirect to the reservation list page after updating
        header('Location: reservationList.php');
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
    <title>Update Reservation</title>

    <script>
    function validateForm() {
        // Get form elements
        var idUser = document.getElementById("idUser").value;
        var dateReserv = document.getElementById("dateReserv").value;
        var nbrPlaces = document.getElementById("nbrPlaces").value;
        var idEvent = document.getElementById("idEvent").value;

        // Check if User ID is empty
        if (idUser == "") {
            alert("User ID is required.");
            return false;
        }

        // Check if Reservation Date is empty
        if (dateReserv == "") {
            alert("Reservation Date is required.");
            return false;
        }

        // Check if Number of Places is a valid number and greater than 0
        if (nbrPlaces == "" || isNaN(nbrPlaces) || nbrPlaces <= 0) {
            alert("Please enter a valid number of places (greater than 0).");
            return false;
        }

        // Check if Event ID is empty
        if (idEvent == "") {
            alert("Event ID is required.");
            return false;
        }

        // If all fields are valid, allow the form to be submitted
        return true;
    }
</script>
</head>

<body>

    <?php
    // Check if reservation ID is set in the POST request
    if (isset($_POST['idReserv'])) {
        // Retrieve the reservation by its ID for updating
        $reservation = $reservationC->getReservationById($_POST['idReserv']);
    ?>
        <!-- Populate the form with the existing reservation details -->
        <form id="reservation" action="" method="POST">
            <label for="idReserv">Reservation ID:</label>
            <input class="form-control form-control-user" type="text" id="idReserv" name="idReserv" readonly value="<?php echo $_POST['idReserv'] ?>"><br>

            <label for="idUser">User ID:</label>
            <input class="form-control form-control-user" type="text" id="idUser" name="idUser" value="<?php echo $reservation['idUser'] ?>"><br>

            <label for="dateReserv">Reservation Date:</label>
            <input class="form-control form-control-user" type="date" id="dateReserv" name="dateReserv" value="<?php echo $reservation['dateReserv'] ?>"><br>

            <label for="nbrPlaces">Number of Places:</label>
            <input class="form-control form-control-user" type="number" id="nbrPlaces" name="nbrPlaces" value="<?php echo $reservation['nbrPlaces'] ?>"><br>

            <label for="idEvent">Event ID:</label>
            <input class="form-control form-control-user" type="text" id="idEvent" name="idEvent" value="<?php echo $reservation['idEvent'] ?>"><br>

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
