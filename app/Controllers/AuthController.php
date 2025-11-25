<?php
require_once __DIR__ . '/../Models/User.php';

class AuthController {
  public function showLogin() {
    require __DIR__ . '/../Views/login.php';
  }

  public function login() {
    if (!hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'] ?? '')) {
      die('CSRF inválido');
    }
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $userModel = new User();
    $user = $userModel->findByEmail($email);
    if ($user && password_verify($password, $user['password_hash'])) {
      session_regenerate_id(true);
      $_SESSION['user_id'] = $user['id'];
      header('Location: /');
      exit;
    }
    $error = 'Credenciais inválidas';
    require __DIR__ . '/../Views/login.php';
  }
}
