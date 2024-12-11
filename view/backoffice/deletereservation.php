<?php
include '../../controller/reservationcontroller.php';
$reservationC = new reservationcontroller();

// استرجاع معرف الحجز من الرابط باستخدام طريقة $_GET["idReserv"]
$reservationC->deleteReservation($_GET["idReserv"]);

// بعد الحذف، يتم إعادة التوجيه إلى صفحة قائمة الحجوزات
header('Location:reservationList.php');
?>
