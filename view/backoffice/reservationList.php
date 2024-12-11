<?php
include "../../controller/reservationcontroller.php";

// إنشاء كائن من الـ reservationcontroller لاسترجاع قائمة الحجوزات
$reservationC = new reservationcontroller();
$list = $reservationC->reservationList(); // استرجاع كل الحجوزات

// التحقق من أن القائمة ليست فارغة
if (empty($list)) {
    $message = "Aucune réservation trouvée.";
} else {
    $message = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation List</title>
</head>

<body>
    <a href="addreservation.php">Add New Reservation</a>
    <h3><?= $message ?></h3> <!-- عرض رسالة في حال كانت القائمة فارغة -->

    <table border>
        <tr>
            <th>IdReservation</th>
            <th>User ID</th>
            <th>Date of Reservation</th>
            <th>Number of Places</th>
            <th>Event ID</th>
            <th>Action</th>
        </tr>
        <?php
        // عرض كل الحجزات
        foreach ($list as $reservation) {
        ?>
            <tr>
                <td><?= $reservation['idReserv']; ?></td>
                <td><?= $reservation['idUser']; ?></td>
                <td><?= $reservation['dateReserv']; ?></td>
                <td><?= $reservation['nbrPlaces']; ?></td>
                <td><?= $reservation['idEvent']; ?></td>

                <td>
                    <!-- Update reservation button -->
                    <form method="POST" action="updatereservation.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value="<?= $reservation['idReserv']; ?>" name="idReserv">
                    </form>
                    <!-- Delete reservation link -->
                    <a href="deletereservation.php?idReserv=<?= $reservation['idReserv']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>
