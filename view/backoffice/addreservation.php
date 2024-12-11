<?php
include '../../model/reservation.php';
include '../../controller/reservationcontroller.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // إنشاء كائن الحجز بناءً على المدخلات
    $reservation = new reservation(
        null,
        $_POST["idUser"], 
        $_POST["dateReserv"], 
        $_POST["nbrPlaces"], 
        $_POST["idEvent"]
    );

    // استدعاء دالة الإضافة من وحدة التحكم
    $reservationC = new reservationcontroller();
    $reservationC->addReservation($reservation);

    // إعادة توجيه المستخدم إلى قائمة الحجوزات
    header('Location:reservationList.php');
    exit();
}

require_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une réservation</title>
    <script>
        // JavaScript validation function
        function validateForm() {
            // Retrieve the field values
            var idUser = document.forms["reservationForm"]["idUser"].value;
            var dateReserv = document.forms["reservationForm"]["dateReserv"].value;
            var nbrPlaces = document.forms["reservationForm"]["nbrPlaces"].value;
            var idEvent = document.forms["reservationForm"]["idEvent"].value;

            // Check if all fields are filled
            if (idUser == "" || dateReserv == "" || nbrPlaces == "" || idEvent == "") {
                alert("Tous les champs sont obligatoires.");
                return false;
            }

            // Check the number of places is a positive integer
            if (nbrPlaces <= 0 || isNaN(nbrPlaces)) {
                alert("Le nombre de places doit être un entier positif.");
                return false;
            }

            // Check the date format (YYYY-MM-DD)
            var datePattern = /^\d{4}-\d{2}-\d{2}$/;
            if (!dateReserv.match(datePattern)) {
                alert("Date invalide. Le format doit être YYYY-MM-DD.");
                return false;
            }

            return true; // Allow form submission if all inputs are valid
        }
    </script>
</head>

<body>
    <form name="reservationForm" method="post" action="" onsubmit="return validateForm()">
        <label for="idUser">ID Utilisateur:</label>
        <input type="text" name="idUser" value="<?= isset($_POST['idUser']) ?($_POST['idUser']) : '' ?>" required>

        <label for="dateReserv">Date de reservation:</label>
        <input type="date" name="dateReserv" value="<?= isset($_POST['dateReserv']) ? ($_POST['dateReserv']) : '' ?>" required>

        <label for="nbrPlaces">Nombre de places:</label>
        <input type="number" name="nbrPlaces" value="<?= isset($_POST['nbrPlaces']) ? ($_POST['nbrPlaces']) : '' ?>" required>

        <label for="idEvent">ID Evenement:</label>
        <input type="text" name="idEvent" value="<?= isset($_POST['idEvent']) ?($_POST['idEvent']) : '' ?>" required><br>

        <input type="submit" value="Enregistrer">
    </form>
</body>

</html>
