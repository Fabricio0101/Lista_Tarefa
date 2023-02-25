<?php
    if(isset($_POST['submit'])) {

        include_once('bdconfig.php');
        
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['Gênero'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco =  $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,sexo,data_nasc,cidade,estado,endereco) VALUES ('$nome','$senha','$email', '$telefone', '$sexo', '$data_nasc', '$cidade', '$estado', '$endereco')");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>

<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(45deg, cyan, yellow);
}

.box {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: rgba(0, 0, 0, 0.8);
    padding: 15px;
    border-radius: 15px;
    width: 20%;
    color: white;
}

fieldset {
    border: 3px solid cyan;
}

legend {
    border: 1px solid #00cbe1;
    padding: 10px;
    text-align: center;
    background-color: #00cbe1;
    border-radius: 8px;
}

.inputBox {
    position: relative;
}

.inputUser {
    background: none;
    border: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
    font-size: 15px;
    width: 100%;
    letter-spacing: 2px;
}

.labelInput {
    position: absolute;
    top: 0px;
    left: 0px;
    pointer-events: none;
    transition: .5s;
}

.inputUser:focus ~ .labelInput, 
.inputUser:valid ~ .labelInput {
    top: -20px;
    font-size: 12px;
    color: #00cbe1;
}

#data_nascimento {
    border: none;
    padding: 8px;
    border-radius: 10px;
    outline: none;
    font-size: 15px;
}

#submit {
    background-color: dodgerblue;
    border: none;
    padding: 15px;
    width: 100%;
    border-radius: 10px;
    color: white;
    font-size: 15px;
    cursor: pointer;
}

#submit:hover {
    background-color: deepskyblue;
}

button:hover {
    background-color: deepskyblue;
}

a {
    background-color: dodgerblue;
    border: none;
    padding: 11px;
    padding-left: 45%;
    padding-right: 44%;
    border-radius: 10px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    text-decoration: none;
}

a:hover {
    background-color: deepskyblue;
}

</style>

    <div class="box">
        <form action="cadastro.php" method="post">
            <fieldset>
                <legend><b>Formulário de Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome Completo</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo:</p>
                <input type="radio" id="feminino" name="Gênero" value="feminino" required>
                <label for="feminino">Feminino</label>
                <input type="radio" id="masculino" name="Gênero" value="masculino" required>
                <label for="masculino">Masculino</label>
                <input type="radio" id="outro" name="Gênero" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <label for="data_nascimento"><b></b>Data de nascimento:</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="telefone" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="telefone" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="endereco" id="endereco" class="inputUser" required>
                    <label for="telefone" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
                <br><br>
                <a href="home.php">Voltar</a>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>