<?php

namespace App\Repository;

use App\Config\Database;
use App\Entity\User;

class UserRepository {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM users");
        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row['name'], $row['mail'], $row['id']);
        }
        return $users;
    }

    public function create(User $user) {
        $stmt = $this->db->prepare("INSERT INTO users (name, mail) VALUES (:name, :mail)");
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':mail', $user->getMail());
        return $stmt->execute();
    }

    public function read($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new User($data['name'], $data['mail'], $data['id']) : null;
    }

    public function update(User $user) {
        $stmt = $this->db->prepare("UPDATE users SET name = :name, mail = :mail WHERE id = :id");
        $stmt->bindValue(':name', $user->getName());
        $stmt->bindValue(':mail', $user->getMail());
        $stmt->bindValue(':id', $user->getId());
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
