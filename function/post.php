<?php


$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(!empty($_POST['title']) && !empty($_POST['text']) ){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $tag = $_POST['tag'];

    $instruction = "INSERT INTO post( id_user, texte, id_tag, title) VALUES (:id_user, :text, :tag, :title)";
    $prepare = $sql->prepare($instruction);
    $prepare->execute(array(':id-user'=>$id_user,':title'=>$title, ':tag'=>$tag, ':text'=>$text));

    

 header('location:http://localhost/Projet_PHP/page.php');
}else{header('location:http://localhost/Projet_PHP/post_write.php');}







