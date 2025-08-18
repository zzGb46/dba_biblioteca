<?php 
require 'conexao.php';


if(isset($_POST['nome'], $_POST['email'], $_POST['nascimento'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = $_POST['nascimento'];

    $query = "INSERT INTO tb_teste(nome, email, idade) 
    VALUES(?, ?, ?)";

    $resultado= $pdo->prepare($query);
    $sucesso = $resultado->execute([$nome, $email, $idade]);

    if(isset($sucesso)){
        echo 'cadastro feito';
    }else{
        echo 'ruim';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="POST">
    <input type="text" name="nome" placeholder="nome">
    <input type="email" name="email" placeholder="email">
    <label>Idade:</label>
    <input type="date" name="nascimento" placeholder="idade">
    <input type= "submit">
</form>
    
</body>
</html>