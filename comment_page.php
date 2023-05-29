<?php
    $see_more = $_GET['see_more'];
    $sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
    $view = "SELECT * from post p LEFT JOIN comment c on p.id_p = c.id_post_comment WHERE p.id_p = :id ORDER BY created_comment DESC";
   
    $prepare = $sql->prepare($view);
    $prepare->execute(array(':id'=> $see_more));
?>



<? include ('assets/header.php')?>
<?php

$value = 0;
while($blog = $prepare->fetch(mode: PDO :: FETCH_ASSOC)){
    
    if($value ===0){ 
        ?>
        <h1><?=($blog['title'])?></h1>
        <p><?=($blog['texte'])?></p>
        <?php
    
        

    ?>
        
        <form action="function/comment.php" method="post">
            <input type="text" placeholder="comment" name="comment">
            <input type="hidden" name="id_comment" value="<?=($blog['id_p'])?>">
            <input type="hidden" name="tag_comment" value="<?= ($blog['id_tag'])?>"></input>
            <input type="hidden" name="see_more" value= <?=($_GET['see_more'])?>>
            <button type="submit" value="submit">send</button>
        </form>


    <?php 
$value = 1;};
    if($blog['id_c'] != null){
    ?>
    <p> <?=($blog['texte_comment'])?></p> 
    <form action="msg_change.php" method="post">
        <input type="hidden" name="text_comment" value="<?=($blog['texte_comment'])?>">
        <button type="submit">modify</button>
        <input type="hidden" name="id_c" value="<?=($blog['id_c'])?>">
        <input type="hidden" name="id_user" value="<?=($blog['id_user'])?>">
        <input type="hidden" name="see_more" value= <?=($see_more)?>>
    </form>
    <form action="function/handle_comment_delete.php" method="post">    
        <input type="hidden"name="delete" value="<?=($blog['id_c'])?>">
        <input type="submit" value="delete">
        <input type="hidden" name="see_more" value= <?=($_GET['see_more'])?>>
    </form>

    <?php }; 
}; ?>
    
    
        




    