<?php
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(!empty($_POST['comment'])){
    $comment = $_POST['comment'];
    $id_post = $_POST['id_comment'];
    $tag_comment = $_POST['tag_comment'];
    

    $instruction = "INSERT INTO `comment`(`id_user`, `texte_comment`, `id_tag_comment`,`id_post_comment`) VALUES (4,:text,:id_tag_comment,:id_post_comment)"; 
    $prepare = $sql->prepare($instruction);
    $prepare->execute(array( ':text'=>$comment, ':id_tag_comment'=>$tag_comment, ':id_post_comment'=>$id_post));
    
    
   $see_more = $_POST['see_more'];
 header('location:http://localhost/Projet_PHP/comment_page.php?see_more='. $see_more);
}else{
    $see_more = $_POST['see_more'];
    header('location:http://localhost/Projet_PHP/comment_page.php?see_more='. $see_more);}

?>