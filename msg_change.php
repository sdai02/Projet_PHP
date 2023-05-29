<?php 
$text_comment = $_POST['text_comment'];
$id_c = $_POST['id_c'];



?>
<?php include_once ('assets/header.php')?>
<form action="function/handle_msg_update.php" method="post">
    <input type="text" name="text1" value="<?=($text_comment)?>">
    <button type="submit">send</button>
    <input type="hidden" name="id_c1" value="<?= ($id_c)?>">
    
</form>

