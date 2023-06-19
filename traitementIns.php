<?php

// $first = "";
// $last = "";
// $email="";
// $password = "";

try {
    $bd = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
} catch (Exception $e) {
    echo "Erreur :" .$e->getMessage();
}


if($_POST){
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $requete = $bd->prepare("INSERT INTO user(first_name, last_name, email,is_admin, password) VALUES(:first, :last, :email, 0,:password)");
    $requete ->execute(
        [
            "first"=>$firstname,
            "last"=>$lastname,
            "email"=>$email,
            "password"=>$password,
        ]
        );

}

header("Location:index.php");

?>