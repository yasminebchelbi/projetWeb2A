<?php
require "../config.php";
require_once "../model/forms/Comment.php";  // Inclure le fichier Comment.php

class CommentController {

    // Afficher la liste de tous les commentaires
    public function listComments() {
        $sql = "SELECT * FROM comment";
        $conn = config::getConnexion();

        try {
            $liste = $conn->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Récupérer un commentaire par son ID
    public function getCommentById($id) {
        $sql = "SELECT * FROM comment WHERE id = :id";
        $conn = config::getConnexion();
        try {
            $query = $conn->prepare($sql);
            $query->execute(['id' => $id]);
            $comment = $query->fetch();
            return $comment;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Ajouter un commentaire
    public function addComment($comment) {
        // Vérifiez si le nom est vide
        if (empty($comment->getName())) {
            die("Erreur: Le champ 'nom' ne peut pas être vide.");
        }
    
        $sql = "INSERT INTO commentaires (nom, prenom, email, commentaire, created_at)
                VALUES (:nom, :prenom, :email, :commentaire, :created_at)";
        $conn = config::getConnexion();
    
        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'nom' => $comment->getName(),
                'prenom' => $comment->getSurname(),
                'email' => $comment->getEmail(),
                'commentaire' => $comment->getComment(),
                'created_at' => $comment->getCreatedAt()  // Assurez-vous que created_at est bien défini
            ]);
            echo "Commentaire ajouté avec succès";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    

    // Modifier un commentaire existant
    public function updateComment($comment, $id) {
        $sql = "UPDATE comment SET 
                nom = :nom,
                email = :email,
                comment = :comment,
                created_at = :created_at
                WHERE id = :id";
        $conn = config::getConnexion();

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                'id' => $id,
                'nom' => $comment->getName(),  // Utilisez getName() ici
                'email' => $comment->getEmail(),
                'comment' => $comment->getComment(),
                'created_at' => $comment->getCreatedAt(),  // Utilisez getCreatedAt() ici
            ]);
            echo "Commentaire mis à jour avec succès";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Supprimer un commentaire
    public function deleteComment($id) {
        $sql = "DELETE FROM comment WHERE id = :id";
        $conn = config::getConnexion();
        $req = $conn->prepare($sql);
        $req->bindValue(':id', $id);
        try {
            $req->execute();
            echo "Commentaire supprimé avec succès";
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>

