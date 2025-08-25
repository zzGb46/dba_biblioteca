<?php
require 'conexao.php';

if (
    isset(
    $_POST['titulo'],
    $_POST['autor'],
    $_POST['ano'],
    $_POST['descricao']
)
) {

    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $descricao = $_POST['descricao'];

    $insert = $pdo->prepare("INSERT INTO tb_livro(
    titulo,
    autor,
    ano,
    descricao)
    VALUES(
    ?,
    ?,
    ?,
    ?
    )");
    $result = $insert->execute(
        [
            $titulo,
            $autor,
            $ano,
            $descricao
        ]
    );
    if(isset($result)){
        echo "CADASTRO FEITO";
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
    <div>
        <h1>Livros</h1>
        <form method="POST">
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo">
            </div>
            <div>
                <label for="autor">Autor</label>
                <input type="text" name="autor">
                    <!-- <?php
                    $select = $pdo->query("SELECT * from tb_autor");
                    $autor = $select->execute();
                    ?> -->
                </select>
            </div>
            <div>
                <label for="ano">Ano</label>
                <input type="number" name="ano">
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao">
            </div>
            <div>
                <button type="submit">CADASTRAR</button>
            </div>
        </form>
    </div>
    <?php 
    function livros(){
        global $pdo;
        return $pdo->query("SELECT * from tb_livro");
    }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Autor</th>
                <th>ano</th>
                <th>Descrição</th>
                <th>....</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $livros = livros();
        while ($lista = $livros->fetch()) {
          echo "<tr>";
          echo "<td>" .($lista['id_livro']) . "</td>";
          echo "<td>" .($lista['titulo']) . "</td>";
          echo "<td>" .($lista['autor']) . "</td>";
          echo "<td>" .($lista['ano']) . "</td>";
          echo "<td>" .($lista['descricao']) . "</td>";
          echo "<td>" . "<a href='../alterar_dash.php?id_livro=" .  $lista['id_livro'] . "'><button>ALTERAR</button></a>" . "</td>";
          echo "<td>" . "<a href='../deletar_dash.php?id_livro=" .  $lista['id_livro'] . "'><button>DELETAR</button></a>" . "</td>";
          
          echo "</tr>";
        }
        ?>
        </tbody>
    </table>



</body>

</html>