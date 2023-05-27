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
    <section>
        <h1>Connexion</h1>
        <form action="VérifieCom.php" method="post">
                <br>
                <hr>
                <br> 

            <label for="">Email</label>
            <input type="text" name="email" placeholder="Email">

            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password">

            <input type="submit" value="Connexion">
            <hr>
            <a href="inscription.php">Inscription</a>

        </form>
    </section>
</body>
</html>