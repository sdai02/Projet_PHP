<?php 
$text = $_POST['text'];
$id_p = $_POST['id_p'];
$title = $_POST['title'];




?>
<?php include_once ('assets/header.php')?>
<form action="function/handle_post_update.php" method="post">
    <h1>Title</h1>
    <input type="text" name="title" value="<?=($title)?>">
    <h2>Text</h2>
    <input type="text" name="text" value="<?=($text)?>">
    <input type="hidden" name="id_p" value="<?= ($id_p)?>"><br><br>
    <button type="submit">send</button>
    
    
</form>

