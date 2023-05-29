

<? include ('assets/html.php')?>
    
    <?php include('assets/header.php')?>
    <form action="function/post.php" method="post">
        
        <input type="text" placeholder="Title" name="title" id="title">
        <br>
        
        <input type="text" placeholder="Text" name="text" id="text" >
        <br>
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


