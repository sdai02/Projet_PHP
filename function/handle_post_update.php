<?php 
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
session_start();
$is_admin= $_SESSION['is_admin'];
$_POST['id']= $_SESSION['id'];
$_POST['id_user_comment']= $_SESSION['id_user_comment'];


if(!empty($_POST['texte']) && !empty($_POST['title']) && isset($_POST['id_p']) && $is_admin == 1||$_POST['id']==$_POST['id_user_comment']){
    $text = $_POST['text'];
    $id_p = $_POST['id_p'];
    $title = $_POST['title'];

   

    $instruction = "UPDATE `post` SET `texte` = :texte, `title` = :title WHERE `post`.`id_p` = :id_p";

    $prepare = $sql->prepare($instruction);
    $prepare->execute(array( ':texte'=>$text,':title'=> $title,':id_p'=>$id_p));

    

 header('location:http://localhost/Projet_PHP/home.php');
}else{
    header('location:http://localhost/Projet_PHP/home.php');}


?>