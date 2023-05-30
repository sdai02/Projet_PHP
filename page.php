<?php
    include_once('s.php');
    $sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
    $view = "SELECT * from post ORDER BY created DESC";
    $prepare = $sql->query($view);
    
    $is_admin= $_SESSION['is_admin'];
    $_POST['id']= $_SESSION['id'];
   
    $_POST['id_user_comment']= $_SESSION['id_user_comment'];
    

?>
<?php include_once ('assets/header.php')?>

   
    <?php
        while ($blog = $prepare->fetch(mode: PDO :: FETCH_ASSOC)){
       
        ?>
        <p><?=($blog['id_user_comment'])?></p>
        <h1><?=($blog['title'])?></h1>
        <p><?=($blog['texte'])?></p>
        <form action="tag.php" methode="get">
            <button type="submit" name="tag" value="<?= ($blog['id_tag'])?>"><?=($blog['id_tag'])?></button>
        </form>
        <form action="comment_page.php" >
            <button name="see_more">see more</button></a> 
            <?php $_SESSION['id_p']=$blog['id_p'] ?>
        </form>
        
        <form action="post_change.php" method="post">
        
            <input type="hidden" name="text" value="<?=($blog['texte'])?>">
            <input type="hidden" name="title" value="<?=($blog['title'])?>">
            <button type="submit">modify</button>
            <input type="hidden" name="id_p" value="<?=($blog['id_p'])?>">
            <input type="hidden" name="id_user_comment" value="<?=($blog['id_user_comment'])?>">
        </form>
        
        <form action="function/handle_delete.php" method="post">
            <button type="submit" name="delete"  value="<?=($blog['id_p'])?>">delete</button>
        </form>  

        <?php 
        $_SESSION['id_user_comment']= $blog['id_user_comment'];
      

    };
    ?>
    





