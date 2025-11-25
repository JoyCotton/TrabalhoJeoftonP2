<!doctype html><html><head><meta charset="utf-8"><title>Login</title></head><body>
<?php if (!empty($error)) echo "<p style='color:red'>".htmlspecialchars($error)."</p>"; ?>
<form method="post" action="/login">
  <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
  <label>Email: <input type="email" name="email" required></label><br>
  <label>Senha: <input type="password" name="password" required></label><br>
  <button type="submit">Entrar</button>
</form>
</body></html>
