<?php

require('C:/xampp/htdocs/Proje/config.php');

class reservationcontroller
{

    // List all reservations with event details using JOIN
    public function reservationList() {
    $conn = DatabaseConfig::getConnexion();
    // استعلام لجلب الحجزات مع الربط بين جدول الحجزات وجدول الأحداث
    $sql = "SELECT r.idReserv, r.idUser, r.dateReserv, r.nbrPlaces, r.idEvent
            FROM reservation r
            INNER JOIN event e ON r.idEvent = e.idEvent"; // ربط جدول الحجزات مع جدول الأحداث
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // إرجاع البيانات كمصفوفة
}


    // Get one reservation by ID with event details
    function getReservationById($idReserv)
    {
        $sql = "SELECT 
                    reservation.*, 
                    event.titre AS eventTitle, 
                    event.type AS eventType, 
                    event.date AS eventDate, 
                    event.adresse AS eventAddress
                FROM reservation 
                JOIN event ON reservation.idEvent = event.idEvent 
                WHERE reservation.idReserv = :idReserv";
        $db = DatabaseConfig::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute(['idReserv' => $idReserv]);

            $reservation = $query->fetch();
            return $reservation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Add a new reservation
    public function addReservation($reservation)
    {
        $sql = "INSERT INTO reservation (idReserv, idUser, dateReserv, nbrPlaces, idEvent)
        VALUES (NULL, :idUser, :dateReserv, :nbrPlaces, :idEvent)";
        $conn = DatabaseConfig::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'idUser' => $reservation->getIdUser(),
                'dateReserv' => $reservation->getDateReserv(),
                'nbrPlaces' => $reservation->getNbrPlaces(),
                'idEvent' => $reservation->getIdEvent()
            ]);
            echo "Reservation inserted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Update a reservation
    function updateReservation($reservation, $idReserv)
    {
        $db = DatabaseConfig::getConnexion();

        $query = $db->prepare(
            'UPDATE reservation SET 
                idUser = :idUser,
                dateReserv = :dateReserv,
                nbrPlaces = :nbrPlaces,
                idEvent = :idEvent
            WHERE idReserv = :idReserv'
        );
        try {
            $query->execute([
                'idReserv' => $idReserv,
                'idUser' => $reservation->getIdUser(),
                'dateReserv' => $reservation->getDateReserv(),
                'nbrPlaces' => $reservation->getNbrPlaces(),
                'idEvent' => $reservation->getIdEvent(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Delete a reservation by ID
    public function deleteReservation($idReserv)
    {
        $sql = "DELETE FROM reservation WHERE idReserv=:idReserv";
        $conn = DatabaseConfig::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':idReserv', $idReserv);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
