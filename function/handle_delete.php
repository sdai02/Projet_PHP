<?php 
session_start();
$is_admin= $_SESSION['is_admin'];
$_POST['id']= $_SESSION['id'];
$_POST['id_p']= $_SESSION['id_p'];
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if($is_admin == 1 | $_POST['id']==$_POST['id_p']){
$delete = $_POST['delete'];
    
$instruction = 'DELETE c FROM comment c JOIN post on c.id_post_comment= post.id_p AND c.id_post_comment = :id';
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':id'=> $delete,));


$instruction2 = 'DELETE FROM `post` WHERE id_p = :id';
$prepare = $sql->prepare($instruction2);
$prepare->execute(array(':id'=> $delete,));



header('location:http://localhost/Projet_PHP/page.php');
}
else{
    header('location:http://localhost/Projet_PHP/page.php');
};
?>