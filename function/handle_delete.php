<?php 



$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(isset($_POST['delete'])){
$delete = $_POST['delete'];
    
$instruction = 'DELETE c FROM comment c JOIN post on c.id_post_comment= post.id AND c.id_post_comment = :id';
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':id'=> $delete,));


$instruction2 = 'DELETE FROM `post` WHERE id = :id';
$prepare = $sql->prepare($instruction2);
$prepare->execute(array(':id'=> $delete,));



header('location:http://localhost/Projet_PHP/page.php');
}else{
    header('location:http://localhost/Projet_PHP/page.php');
};
?>