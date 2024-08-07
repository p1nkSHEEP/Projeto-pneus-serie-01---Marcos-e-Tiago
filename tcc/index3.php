<?php
if (isset($_POST['submit']))
    include_once("config.php");

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process registration form submission
if (isset($_POST['submit'])) {

    // Sanitize user input
    $nome = sanitizeInput($_POST['nome']);
    $cpf = sanitizeInput($_POST['CPF']);
    $email = sanitizeInput($_POST['email']);
    $username = sanitizeInput($_POST['username']);
    $password = sanitizeInput($_POST['password']);
    $confirm_passwor = sanitizeInput($_POST['confirm_password']);
    

    // Prepare and execute SQL query to insert user data
    $sql = "INSERT INTO clientes (nome, CPF, email, username, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('ssssss', $nome, $cpf, $email, $username, $password, $confirm_password);

    if ($stmt->execute()) {
        echo "<p class='success'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p class='error'>Falha ao cadastrar usuário: " . $conexao->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Início</a></li>
                <li><a href="#about">Sobre Nós</a></li>
                <li><a href="#products">Produtos</a></li>
                <li><a href="#contact">Contato</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Registro</h2>
        <form actiton="index3.php" method="post" id="registrationForm">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="CPF">CPF:</label>
                <input type="text" id="CPF" name="CPF" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Usuário:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirmar Senha:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" >
            </div>
        </form>
    </div>
</body>
</html>