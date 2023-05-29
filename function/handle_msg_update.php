<?php 
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
session_start();
$is_admin= $_SESSION['is_admin'];
$_POST['id']= $_SESSION['id'];
$_POST['id_user_comment']= $_SESSION['id_user_comment'];


if(empty($_POST['texte_comment']) && $is_admin == 1||$_POST['id']==$_POST['id_user_comment']){
    $text_comment = $_POST['text1'];
    $id_c = $_POST['id_c1'];
    $see_more = $_POST['see_more'];

    $instruction = "UPDATE `comment` SET `texte_comment` = :texte_comment WHERE `id_c` = :id_c";

    $prepare = $sql->prepare($instruction);
    $prepare->execute(array( ':texte_comment'=>$text_comment, ':id_c'=>$id_c));

    

 header('location:http://localhost/Projet_PHP/comment_page.php?see_more='.$see_more);
}else{$see_more = $_POST['see_more'];
    header('location:http://localhost/Projet_PHP/comment_page.php?see_more='.$see_more);}


?>