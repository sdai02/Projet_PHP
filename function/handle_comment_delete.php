<?php 



$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");

if(isset($_POST['delete'])){
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