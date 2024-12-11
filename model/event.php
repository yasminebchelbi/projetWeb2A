<?php

class event {
    private $idEvent;
    private $titre;
    private $type;
    private $date;
    private $adresse;
    private $description;

    public function __construct($idEvent, $titre, $type, $date, $adresse, $description) {
        $this->idEvent = $idEvent;
        $this->titre = $titre;
        $this->type = $type;
        $this->date = $date;
        $this->adresse = $adresse;
        $this->description = $description;
    }

    /**
     * Get the value of id
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set the value of id
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
        return $this;
    }

    /**
     * Get the value of titre
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}

?>