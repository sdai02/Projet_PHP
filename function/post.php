<?php


$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(!empty($_POST['title']) && !empty($_POST['text']) ){
    $title = $_POST['title'];
    $text = $_POST['text'];
    $tag = $_POST['tag'];

    $id_user = $_POST['id_user'];

    $instruction = "INSERT INTO post( id_user_comment, texte, id_tag, title) VALUES (:id, :text, :tag, :title)";
    $prepare = $sql->prepare($instruction);
    $prepare->execute(array(':id'=>$id_user,':title'=>$title, ':tag'=>$tag, ':text'=>$text));

    

 header('location:http://localhost/Projet_PHP/page.php?id='.$id_user);
}else{
    header('location:http://localhost/Projet_PHP/home.php?id='.$id_user);
}








