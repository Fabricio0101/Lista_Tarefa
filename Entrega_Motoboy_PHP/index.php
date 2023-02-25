<?php

if((isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: home.php');
}

require_once "init.php";

use Classes\Tarefa;

$tarefa = new Tarefa();

if (isset($_GET['concluir'])) {
    $id = filter_input(INPUT_GET, "concluir", FILTER_SANITIZE_NUMBER_INT);
    $tarefa->buscar($id);
    $tarefa->concluida = 1;
    $tarefa->salvar();
    header('Location: ' . BASE_URL);
    die;
}

if (isset($_GET['reabrir'])) {
    $id = filter_input(INPUT_GET, "reabrir", FILTER_SANITIZE_NUMBER_INT);
    $tarefa->buscar($id);
    $tarefa->concluida = 0;
    $tarefa->salvar();
    header('Location: ' . BASE_URL);
    die;
}

if (isset($_GET['excluir'])) {
    $id = filter_input(INPUT_GET, "excluir", FILTER_SANITIZE_NUMBER_INT);
    $tarefa->excluir($id);
    header('Location: ' . BASE_URL);
    die;
}

if (isset($_POST['descricao'])) {
    $tarefa->id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $tarefa->descricao = filter_input(INPUT_POST, "descricao", FILTER_SANITIZE_SPECIAL_CHARS);
    $tarefa->concluida = filter_input(INPUT_POST, "concluida", FILTER_SANITIZE_SPECIAL_CHARS) == 'on'? 1 : 0;
    $msgValidacao = $tarefa->validar();
    if (!$msgValidacao) {
        $tarefa->salvar();
    } else {
        $_SESSION['msg'] = $msgValidacao;
    }

    header('Location: ' . BASE_URL);
    die;
}

if (isset($_GET['editar'])) {
    $id = filter_input(INPUT_GET, "editar", FILTER_SANITIZE_NUMBER_INT);
    $tarefa->buscar($id);
}

$tarefas = $tarefa->lista();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefas Motoboy</title>
</head>
<body>
<style>

body {
    padding: 0;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: bisque;        
}

.navbar {
    background-color: white;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
}

.caixa {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.8);
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 70px;
    color: white;
    border-radius: 15px;
}

li {
    margin-top: 10px;
    border: 2px solid;
    padding: 10px;
}

a{
    color: white;
}

input {
    padding: 10px;
    border: none;
    outline: none;
    font-size: 15px;
    border-radius: 5px;
    width: 80%;
}

button {
    background-color: dodgerblue;
    border: none;
    padding: 10px;
    border-radius: 7px;
    color: white;
    font-size: 15px;
    cursor: pointer;
    width: 50%;
}


.concluida {
    display: flex;
    
    align-items: center;
    flex-direction: row;
}

.input-1 {
    width: 50px;
    margin-left: -120px;
}

h4 {
    width: 90%;
}

.btn-danger {
    text-decoration: none;
    background-color: red;
    padding: 10px;
    border-radius: 10px;

}

</style>
    <nav class="navbar">
        <div class="container-fluid">
            <h1>SISTEMA TAREFA MOTOBOY</h1>
        </div>
        <div class="d-flex">
            <a href="/Entrega_Motoboy_PHP/login/sair.php" class="btn-danger">Sair</a>
        </div>
    </nav>
    <div class="caixa">
        <h1>ATIVIDADES</h1>
        <br><br>
        <div class="formulario">
            <form method="post">
                <label for="descricao">Adicionar Tarefa</label>
                <br><br>
                <input type="hidden" name="id" value="<?= $tarefa->id ?>" />
                <input type="text" name="descricao" value="<?= $tarefa->descricao ?>" />
                <br><br>
                <button type="submit">Salvar</button>
                <br><br>
            <div class="concluida">
                <h4>Tafera Concluida:</h4>
                <input type="checkbox" name="concluida" class="input-1" <?= $tarefa->concluida==1 ? "checked": "" ?> />
            </div>    
            </form>
        <?php if(isset($_SESSION['msg'])):$mensagem = $_SESSION['msg']; unset($_SESSION['msg']); ?>
            <span><?=$mensagem?></span>
        <?php endif; ?>
    </div>
    <br><br>
    <div class="lista">
        <ul>
            <?php foreach($tarefas as $registro): ?>
                <li class="tarefas">
                    <?=$registro->descricao?>
                    <a href="?editar=<?=$registro->id?>">[Visualizar]</a>
                    <a href="?editar=<?=$registro->id?>">[Editar]</a>
                    <a href="?excluir=<?=$registro->id?>">[Excluir]</a>
                    <?php if ($registro->concluida==0): ?>
                        <a href="?concluir=<?=$registro->id?>">[Concluir]</a>
                    <?php else: ?>
                        <a href="?reabrir=<?=$registro->id?>">[Reabrir]</a>
                    <?php endif; ?>

                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    </div>

</body>
</html>