<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, cyan, yellow);        
}

.caixa {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    padding: 80px;
    color: white;
    border-radius: 15px;
}

input {
    padding: 15px;
    border: none;
    outline: none;
    font-size: 15px;
}

.inputSubmit {
    background-color: dodgerblue;
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
    color: white;
    font-size: 15px;
    cursor: pointer;
}

.inputSubmit:hover {
    background-color: deepskyblue;
}

a {
    color: white;
    background-color: dodgerblue;
    border: none;
    text-decoration: none;
    padding: 5px;
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
}

a:hover {
    background-color: deepskyblue;
}

</style>

    <div class="caixa">
        <form action="login.php" method="POST">
            <h1>Login</h1>
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="password" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit" value="Enviar">
            <br><br>
            <p>Não possuí um cadastro?</p>
        </form>
        <a href="cadastro.php">Clique aqui</a>
    </div>
</body>
</html>