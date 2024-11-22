<?php

class Comment {
    private $id;
    private $name;        // Nom
    private $prenom;      // Prénom
    private $email;       // Email
    private $comment;     // Commentaire
    private $created_at;  // Date de création

    /**
     * Constructeur de la classe Comment.
     * @param string $name
     * @param string $prenom
     * @param string $email
     * @param string $comment
     * @param string $created_at
     * @param int|null $id
     */
    public function __construct($name, $prenom, $email, $comment, $created_at, $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->comment = $comment;
        $this->created_at = $created_at;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     * @param int $id
     * @return self
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     * @param string $name
     * @return self
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of prenom (prénom)
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * Set the value of prenom (prénom)
     * @param string $prenom
     * @return self
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set the value of email
     * @param string $email
     * @return self
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment() {
        return $this->comment;
    }

    /**
     * Set the value of comment
     * @param string $comment
     * @return self
     */
    public function setComment($comment) {
        $this->comment = $comment;
        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt() {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     * @param string $created_at
     * @return self
     */
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
        return $this;
    }
}

?>



