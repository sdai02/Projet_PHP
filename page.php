<?php

    $sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
    $view = "SELECT * from post ORDER BY created DESC";
    
    $prepare = $sql->query($view);


?>
<?php include ('assets/html.php')?>

    <?php include ('assets/header.php')?>
    <?php
        while ($blog = $prepare->fetch(mode: PDO :: FETCH_ASSOC)){
       
        ?>
        <h1><?=($blog['title'])?></h1>
        <p><?=($blog['texte'])?></p>
        <form action="tag.php" methode="get">
            <button type="submit" name="tag" value="<?= ($blog['id_tag'])?>"><?=($blog['id_tag'])?></button>
        </form>
        <form action="comment_page.php" method="get">
            <button name="see_more" value="<?=($blog['id'])?>">see more</button></a> 
        </form>
        <form action="function/handle_delete.php" method="post">
            <button type="submit" name="delete"  value="<?=($blog['id'])?>">delete</button>
        </form>  
        <?php 
    };
    ?>
    





