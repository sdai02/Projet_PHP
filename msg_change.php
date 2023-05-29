<?php 
$text_comment = $_POST['text_comment'];
$id_c = $_POST['id_c'];
$see_more = $_POST['see_more'];

echo($text_comment
.$id_c.
$see_more);
?>

<form action="function/handle_msg_update.php" method="post">
    <input type="text" name="text1" value="<?=($text_comment)?>">
    <button type="submit">send</button>
    <input type="hidden" name="id_c1" value="<?= ($id_c)?>">
    <input type="hidden" name="see_more" value= "<?=($see_more)?>">
</form>

