<?php
session_start();
if (isset($_SESSION['$password'])) {
    header('Location: deconnexion.php');
}


$id = $_SESSION['id'];
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
$instruction = "SELECT * FROM `user` WHERE id = :id ";
$prepare1 = $sql->prepare($instruction);
$prepare1->execute(array(':id'=> $id));
?>
    <?php include ('assets/header.php')?>
    <h1>Bienvenue sur le Blog</h1>
    <?php 
    while($blog = $prepare1->fetch(mode: PDO :: FETCH_ASSOC)){
        ?>
        <p><?=($blog['first_name'])?></p>
        <form action="function/post.php?id=<?=($pw)?>" method="post">
            <input type="text" placeholder="Title" name="title" id="title">
            <br>
            <input type="text" placeholder="Text" name="text" id="text" >
            <input type="hidden" name="id_user" value="<?=($blog['id'])?>">
            <label for="tag">tag</label>
            <select name="tag" id="tag">
                <option value="sport">sport</option>
                <option value="culture">culture</option>
                <option value="jeux_video">jeux video</option>
                <option value="manga">manga</option>
            </select>
            <BR></BR>
            <button type="submit">send</button>
            
        </form>
    <?php  }; 
?>

    <a href="deconnexion.php"> <button>Déconnexion</button> </a>
<?include('page.php')?>

