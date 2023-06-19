<?php 
session_start();
$_SESSION['id_comment'];
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if($_SESSION['is_admin'] == 1 || $_SESSION['id']==$_SESSION['id_user_comment']){

$instruction = 'DELETE FROM `comment` WHERE id_c = :id';
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':id'=> $_POST['delete']));

header('location:http://localhost/Projet_PHP/comment_page.php');
}
?>