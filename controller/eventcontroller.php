<?php

require('C:/xampp/htdocs/Proje/config.php');

class eventcontroller
{
    // select all event list
    public function eventList()
    {
        $sql = "SELECT * FROM event";
        $conn = DatabaseConfig::getConnexion();

        try {
            $liste = $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC); // استخدام fetchAll لجلب البيانات
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    //select one event by id
    function geteventById($idEvent)
    {
        $sql = "SELECT * from event where idEvent = :idEvent";
        $db = DatabaseConfig::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idEvent' => $idEvent]);

            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // add new event
    public function addevent($event)
    {
        $sql = "INSERT INTO event (idEvent, titre, type, date, adresse, description)
        VALUES (NULL, :titre, :type, :date, :adresse, :description)";
        $conn = DatabaseConfig::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'titre' => $event->getTitre(),
                'type' => $event->getType(),
                'date' => $event->getDate(),
                'adresse' => $event->getAdresse(),
                'description' => $event->getDescription()
            ]);
            echo "Event inserted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // update event
    function updateevent($event, $idEvent)
    {
        $db = DatabaseConfig::getConnexion();

        $query = $db->prepare(
            'UPDATE event SET 
                titre = :titre,
                type = :type,
                date = :date,
                adresse = :adresse,
                description = :description
            WHERE idEvent = :idEvent'
        );
        try {
            $query->execute([
                'idEvent' => $idEvent,
                'titre' => $event->getTitre(),
                'type' => $event->getType(),
                'date' => $event->getDate(),
                'adresse' => $event->getAdresse(),
                'description' => $event->getDescription(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // delete event by id
    public function deletevent($idEvent)
    {
        $sql = "DELETE FROM event WHERE idEvent = :idEvent";
        $conn = DatabaseConfig::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':idEvent', $idEvent);
        try {
            $req->execute();
            echo "Event deleted successfully";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
