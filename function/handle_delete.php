<?php 
session_start();
$sql = new PDO("mysql:host=localhost:3306;dbname=blog","root","root");

if( $_SESSION['is_admin'] == 1||$_SESSION['id']==$_SESSION['id_user_comment']){
$delete = $_POST['delete'];
    
$instruction = 'DELETE c FROM comment c JOIN post on c.id_post_comment= post.id_p AND c.id_post_comment = :id';
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':id'=> $delete,));


$instruction2 = 'DELETE FROM `post` WHERE id_p = :id';
$prepare = $sql->prepare($instruction2);
$prepare->execute(array(':id'=> $delete,));


header('location:http://localhost/Projet_PHP/home.php');
}
else{
    header('location:http://localhost/Projet_PHP/home.php');
    
};
?>