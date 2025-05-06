<!-- Inicio HTML -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="recursos/img/iconLajes.png">
  <link rel="stylesheet" href="recursos/CSS/estiloT.css">
  <title>Login - Lajes Patagonia</title>
</head>
<body>
  <div class="login-container">
    <h1>LOGIN</h1>
    <form action="Connections/verifica_login.php" method="POST">
  <label>Usuário:</label>
  <input type="text" name="usuario" required placeholder="Digite o seu usuário"><br>
  <label>Senha:</label>
  <input type="password" name="senha" required placeholder="Digite sua senha"><br>
  <button type="submit">Entrar</button> 
</form>
  <div class="forgot-password">
    <a href="#">Esqueceu a senha?</a>
  </div>
</form>
  </div>
</body>
</html>
