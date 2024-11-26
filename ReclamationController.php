<?php
include_once '../config/config.php';
include_once '../model/Reclamation.php';

class ReclamationController
{
    public function getReclamations()
    {
        $sql = "SELECT * FROM reclamations";
        $conn = Config::getConnexion();

        try {
            return $conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamations (nom, email, idCommande, typeCommande, contenuReclamation)
                VALUES (:nom, :email, :idCommande, :typeCommande, :contenuReclamation)";
        $conn = Config::getConnexion();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'nom' => htmlspecialchars($reclamation->getNom(), ENT_QUOTES),
                'email' => htmlspecialchars($reclamation->getEmail(), ENT_QUOTES),
                'idCommande' => $reclamation->getIdCommande(),
                'typeCommande' => $reclamation->getTypeCommande(),
                'contenuReclamation' => htmlspecialchars($reclamation->getContenuReclamation(), ENT_QUOTES)
            ]);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteReclamation($idReclamation)
    {
        $sql = "DELETE FROM reclamations WHERE idReclamation = :idReclamation";
        $conn = Config::getConnexion();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute(['idReclamation' => $idReclamation]);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function updateReclamation($reclamation, $idReclamation)
    {
        $sql = "UPDATE reclamations SET nom = :nom, email = :email, idCommande = :idCommande, typeCommande = :typeCommande, contenuReclamation = :contenuReclamation WHERE idReclamation = :idReclamation";
        $conn = Config::getConnexion();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'nom' => htmlspecialchars($reclamation->getNom(), ENT_QUOTES),
                'email' => htmlspecialchars($reclamation->getEmail(), ENT_QUOTES),
                'idCommande' => $reclamation->getIdCommande(),
                'typeCommande' => $reclamation->getTypeCommande(),
                'contenuReclamation' => htmlspecialchars($reclamation->getContenuReclamation(), ENT_QUOTES),
                'idReclamation' => $idReclamation
            ]);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>
