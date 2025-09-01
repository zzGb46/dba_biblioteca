<?php

require 'conexao.php';

if (isset($_POST['nome'], $_POST['pass'])) {
    $nome = $_POST['nome'];
    $pass = $_POST['pass'];

    $login = $pdo->prepare("SELECT * FROM tb_teste where nome = ? && senha = ?");
    $login->execute([$nome, $pass]);

    $sucesso = $login->fetch();

    if (!empty($sucesso)) {
        header("Location: principal.php");
    } else {
        echo "negado";
    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=stylesheet href="index.css">
    <title>Document</title>
</head>

<body>



    <div id="form">

        <form method="POST">
            <div id="alinhamento4">
                <div id="alinhamento5">
                    <h1>Login</h1>
                    <input type="text" name="nome" placeholder="nome">
                    <input type="text" name="pass" placeholder="senha">
                    <button type="submit">entrar</button>
                </div>
            </div>
        </form>
    </div>


</body>

</html>