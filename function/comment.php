<?php
session_start();
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(!empty($_POST['comment'])){
   

    $instruction = "INSERT INTO `comment`(`id_user`, `texte_comment`, `id_tag_comment`,`id_post_comment`) VALUES (:id ,:text,:id_tag_comment,:id_post_comment)"; 
    $prepare = $sql->prepare($instruction);
    $prepare->execute(array( ':id'=> $_SESSION['id'] ,':text'=>$_POST['comment'], ':id_tag_comment'=>$_POST['tag_comment'], ':id_post_comment'=>$_POST['id_comment']));
    $_SESSION['id_comment']=$_POST['id_comment'];
 header('location:http://localhost/Projet_PHP/comment_page.php');
}else{
    $_SESSION['id_comment']=$_POST['id_comment'];
    header('location:http://localhost/Projet_PHP/comment_page.php');}

?>