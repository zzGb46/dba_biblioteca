<!-- conexao com banco -->
<?php 

$host = "localhost";
$pass = "";
$dbname = "db_biblioteca";
$username = "root";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $pass,
 [PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASSOC]);

//  if(isset($pdo)){
// echo 'existe👍';
//  }
// $i = 0;
// while($i < 5){
//  $sql = "CREATE TABLE tb_minha(
//  id_minha int not null AUTO_INCREMENT primary key,
//  nome varchar(55) not null,
//  email varchar(55) not null,
//  idade date not null
//  );";
//  $resultado = $pdo->prepare($sql);
//  $sucesso= $resultado->execute();

// if(isset($sucesso)){
//     echo 'foi criado';
//     exit;
// }else{
//     echo 'foi naum';
// }
// }
