<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="recursos/estilo.css">
    <link rel="icon" type="image/png" href="recursos/img/iconLajes.png">
    <title>Lajes Patagonia</title>
</head>
<body>
    <main>
  <!-- Formulário -->
  <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form name="logar" method="POST" action="?go=logar">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Digite o seu usuário" required>
                    </div>
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <div class="input-container">
                            <input type="password" name="senha" id="password" placeholder="Digite sua senha" required>
                            <i class="fas fa-eye" id="toggle"></i>
                        </div>
                    </div>
</div>
    
    </main>
</body>
</html>