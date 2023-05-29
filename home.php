<?php
session_start();
if (isset($_SESSION['$password'])) {
    header('Location: deconnexion.php');
}
if(isset($_POST['$password'])){
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
$pw = $_POST['$password'];
$instruction = "SELECT * FROM `user` WHERE password = :pw ";
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':pw'=> $pw));};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <?include('page.php')?>
</head>
<body>
    
    
    <?while($blog = $prepare->fetch(mode: PDO :: FETCH_ASSOC)){?>
       <h1>Bienvenue sur le Blog</h1> <p><?= ($blog['first_name'])?></p>

    <? }; ?>
    <a href="deconnexion.php">Déconnexion</a>
</body>
</html>