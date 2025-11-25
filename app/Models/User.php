<?php
require_once 'Model.php';
class User extends Model {
  public function findByEmail($email) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  public function create($username, $email, $passwordHash) {
    $stmt = $this->pdo->prepare("INSERT INTO users (username,email,password_hash) VALUES (:u,:e,:p)");
    return $stmt->execute(['u'=>$username,'e'=>$email,'p'=>$passwordHash]);
  }
}
