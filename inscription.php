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
        <h1>Inscription</h1>
        <form action="traitementIns.php" method="post">
                <br>
                <hr>
                <br> 
            <label for="">First name</label>
            <input type="text" name="first" placeholder="Username">

            <label for="">Last name</label>
            <input type="text" name="last" placeholder="Username">

            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email">

            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password">

            <input type="submit" value="Valider">
            <a href="index.php">Connexion</a>
        </form>
    </section>
</body>
</html>