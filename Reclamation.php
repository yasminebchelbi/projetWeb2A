<?php
class Reclamation
{
    private $idReclamation;
    private $nom;
    private $email;
    private $idCommande;
    private $typeCommande;
    private $contenuReclamation;

    public function __construct($idReclamation, $nom, $email, $idCommande, $typeCommande, $contenuReclamation)
    {
        $this->idReclamation = $idReclamation;
        $this->nom = $nom;
        $this->email = $email;
        $this->idCommande = $idCommande;
        $this->typeCommande = $typeCommande;
        $this->contenuReclamation = $contenuReclamation;
    }

    public function getIdReclamation() { return $this->idReclamation; }
    public function getNom() { return $this->nom; }
    public function getEmail() { return $this->email; }
    public function getIdCommande() { return $this->idCommande; }
    public function getTypeCommande() { return $this->typeCommande; }
    public function getContenuReclamation() { return $this->contenuReclamation; }
}
?>
