<?php

class reservation {
    private $idReserv;
    private $idUser;
    private $dateReserv;
    private $nbrPlaces;
    private $idEvent;

    public function __construct($idReserv, $idUser, $dateReserv, $nbrPlaces, $idEvent) {
        $this->idReserv = $idReserv;
        $this->idUser = $idUser;
        $this->dateReserv = $dateReserv;
        $this->nbrPlaces = $nbrPlaces;
        $this->idEvent = $idEvent;
    }

    /**
     * Get the value of idReserv
     */
    public function getIdReserv()
    {
        return $this->idReserv;
    }

    /**
     * Set the value of idReserv
     */
    public function setIdReserv($idReserv)
    {
        $this->idReserv = $idReserv;
        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
        return $this;
    }

    /**
     * Get the value of dateReserv
     */
    public function getDateReserv()
    {
        return $this->dateReserv;
    }

    /**
     * Set the value of dateReserv
     */
    public function setDateReserv($dateReserv)
    {
        $this->dateReserv = $dateReserv;
        return $this;
    }

    /**
     * Get the value of nbrPlaces
     */
    public function getNbrPlaces()
    {
        return $this->nbrPlaces;
    }

    /**
     * Set the value of nbrPlaces
     */
    public function setNbrPlaces($nbrPlaces)
    {
        $this->nbrPlaces = $nbrPlaces;
        return $this;
    }

    /**
     * Get the value of idEvent
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set the value of idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
        return $this;
    }
}

?>
