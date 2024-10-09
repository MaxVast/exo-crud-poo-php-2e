<?php

namespace App\Entity;

class User {
    private $id;
    private $username;
    private $mail;
    private $password;
    private $media_object;

    public function __construct($username, $mail, $password, $media_object) {
        $this->username = $username;
        $this->mail = $mail;
        $this->password = $password;
        $this->media_object = $media_object;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() : string {
        return $this->username;
    }

    public function getMail() : string {
        return $this->mail;
    }

    public function getMediaObject() : string {
        return $this->media_object;
    }
}
