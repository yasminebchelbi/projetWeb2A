<?php
include "../../controller/eventcontroller.php";
include "../../model/reservation.php";
include "../../controller/reservationcontroller.php"; // إضافة التحكم الخاص بالحجز

$eventC = new eventcontroller();
$reservationC = new reservationcontroller();

// الحصول على معرّف الحدث عبر الـ GET
$event = null;
if (isset($_GET['idEvent'])) {
    $event = $eventC->getEventById($_GET['idEvent']); // دالة للحصول على تفاصيل الحدث
}

// معالجة الحجز عند إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من وجود الحقول
    if (isset($_POST["idUser"]) && isset($_POST["nbrPlaces"]) && isset($_POST["idEvent"])) {
        // التحقق من أن الحدث موجود
        $event = $eventC->getEventById($_POST['idEvent']);
        if ($event) {
            // إضافة الحجز إلى النظام
            $reservation = new reservation(null, $_POST['idUser'], date('Y-m-d H:i:s'), $_POST['nbrPlaces'], $_POST['idEvent']);
            $reservationC->addReservation($reservation);
            header("Location: reservationSuccess.php"); // أو إعادة توجيه إلى صفحة التأكيد
            exit();
        } else {
            echo "حدث غير موجود.";
        }
    } else {
        echo "يرجى ملء جميع الحقول.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .event-container {
            width: 80%;
            margin: 20px auto;
        }

        .event-card {
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .event-details h2 {
            color: #28a745;
        }

        .reservation-form {
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .reservation-form input[type="number"], .reservation-form input[type="text"] {
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .reservation-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .reservation-form input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="event-container">
        <?php if ($event): ?>
        <div class="event-card">
            <h2><?=($event['titre']); ?></h2>
            <p><strong>Type:</strong> <?= ($event['type']); ?></p>
            <p><strong>Date:</strong> <?= ($event['date']); ?></p>
            <p><strong>Adresse:</strong> <?= ($event['adresse']); ?></p>
            <p><strong>Description:</strong> <?= ($event['description']); ?></p>
        </div>

        <!-- نموذج الحجز -->
        <div class="reservation-form">
            <h3>Reservation</h3>
            <form action="" method="POST">
                <label for="idUser">Votre ID:</label>
                <input type="text" id="idUser" name="idUser" required>
                
                <label for="nbrPlaces">Nombre of Places:</label>
                <input type="number" id="nbrPlaces" name="nbrPlaces" min="1" required>
                
                <input type="hidden" name="idEvent" value="<?=($event['idEvent']); ?>">
                
                <input type="submit" value="Reserve Now">
            </form>
        </div>
        <?php else: ?>
            <p>Event not found.</p>
        <?php endif; ?>
    </div>
</body>

</html>
