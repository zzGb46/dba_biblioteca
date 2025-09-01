<?php 
require 'conexao.php';



if(isset($_POST['nome'], $_POST['email'], $_POST['nascimento'], $_POST['senha'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $idade = $_POST['nascimento'];

    $query = "INSERT INTO tb_teste(nome, email, nascimento, senha) 
    VALUES(?, ?, ?, ?)";

    $resultado= $pdo->prepare($query);
    $sucesso = $resultado->execute([$nome, $email, $idade, $senha]);

    if(isset($sucesso)){
        echo 'cadastro feito';
    }else{
        echo 'ruim';
    }
}

function lista(){
    global $pdo;
    return $pdo->query("SELECT * from tb_teste");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= stylesheet href = "index.css">
    <title>Document</title>
</head>
<body>
    <a href="livros.php">Livros</a>

    <a href="index.php"><button>Sair</button></a>

<form method="POST">
    <div id="alinhamento1">
        <h2>Formulário de cadastro</h2>
        <form method="post">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>
            <div>
                <label for="senha">Senha</label>
                <input type="text" name="senha">
            </div>
            <div>
                <label for="nascimento">Nascimento</label>
                <input type="date" name="nascimento">
            </div>
            <div>
                <button type="submit">CADASTRAR</button>
            </div>
        </form>
    </div>
    <div id= "alinhamento2">
        <h2>Cadastrados</h2>

        <div>
        <table border= "1">
            <thead>
                <tr>
                    <th>id_teste</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Nascimento</th>
                    <th>....</th>
                </tr>
            </thead>
            <tbody>
                <!-- Essa parte será repetida para cada registro do banco -->
                <?php
        $resultado = lista();
        while ($lista = $resultado->fetch()) {
          echo "<tr>";
          echo "<td>" .($lista['id_teste']) . "</td>";
          echo "<td>" .($lista['nome']) . "</td>";
          echo "<td>" .($lista['email']) . "</td>";
          echo "<td>" .($lista['senha']) . "</td>";
          echo "<td>" .($lista['nascimento']) . "</td>";
          echo "<td>" . "<a href='alterar_dash.php?id_teste=" .  $lista['id_teste'] . "'><button>ALTERAR</button></a>" . "</td>";
          echo "<td>" . "<a href='deletar_dash.php?id_teste=" .  $lista['id_teste'] . "'><button>DELETAR</button></a>" . "</td>";
          
          echo "</tr>";
        }
        ?>

                <!-- fim repetição -->
            </tbody>
        </table>
    </div>
</form>


    
</body>
</html>