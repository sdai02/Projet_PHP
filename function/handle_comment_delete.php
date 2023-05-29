<?php 
session_start();
$is_admin= $_SESSION['is_admin'];
$_POST['id']= $_SESSION['id'];
$_POST['id_user_comment']= $_SESSION['id_user_comment'];

$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if($is_admin == 1 || $_POST['id']==$_POST['id_user_comment']){
$delete = $_POST['delete']; 
$instruction = 'DELETE FROM `comment` WHERE id_c = :id';
$prepare = $sql->prepare($instruction);
$prepare->execute(array(':id'=> $delete,));
$see_more = $_POST['see_more'];

header('location:http://localhost/Projet_PHP/comment_page.php?see_more='.$see_more);
}else{
    $see_more = $_POST['see_more']; 
    header('location:http://localhost/Projet_PHP/comment_page.php?see_more='.$see_more);
};
?>