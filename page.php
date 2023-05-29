<?php
  
    $sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
    $view = "SELECT * from post ORDER BY created DESC";
    $prepare = $sql->query($view);


?>
<?php include_once ('assets/header.php')?>

   
    <?php
        while ($blog = $prepare->fetch(mode: PDO :: FETCH_ASSOC)){
       
        ?>
        <h1><?=($blog['title'])?></h1>
        <p><?=($blog['texte'])?></p>
        <form action="tag.php" methode="get">
            <button type="submit" name="tag" value="<?= ($blog['id_tag'])?>"><?=($blog['id_tag'])?></button>
        </form>
        <form action="comment_page.php" method="get">
            <button name="see_more" value="<?=($blog['id_p'])?>">see more</button></a> 
        </form>
        <form action="function/handle_delete.php" method="post">
            <button type="submit" name="delete"  value="<?=($blog['id_p'])?>">delete</button>
        </form>  
        <?php 
        $_SESSION['id_user_comment']= $blog['id_user_comment'];
        echo($blog['id_user_comment']);

    };
    ?>
    





