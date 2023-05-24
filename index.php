<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
    
    <?php
    
    if ($_POST) {
        $handle = fopen("./users.csv", "a+");
        $res = fputcsv($handle, $_POST);
        fclose($handle);
    }
    
    $handle = fopen("./users.csv", "r");
    ?>
        <section class="profils">
            <div class="profil"></div>
            <label class="labela" for="">User</label>
        </section>
        <div class="dia">
        <section class="container py-5">
            <form method="post">
                
                <div class="mb-3">
                    <label for="last_name" class="form-label">Post</label>
                    <input type="text" class="form-control" id="comment" name="comment" placeholder="Comment" >
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
    
            <hr class="m-5">
    
            <table class="table">
                <tbody>
                <?php while ($user = fgetcsv($handle)) : ?>
                    <tr>
                        <td><?= $user[0]; ?></td>
                    </tr>
                <?php
                endwhile;
                fclose($handle);
                ?>
                </tbody>
            </table>
    
        </section>
        </div>
</body>
</html>