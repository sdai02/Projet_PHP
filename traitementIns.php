<?php

// $first = "";
// $last = "";
// $email="";
// $password = "";

try {
    $bd = new PDO("mysql:host=localhost;dbname=blog","root", "" );
} catch (PDOException) {
    echo "Erreur :" .$e->getMessage();
}


if($_POST){
    $firstname = $_POST['first'];
    $lastname = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $requete = $bd->prepare("INSERT INTO user(first_name, last_name, email, password) VALUES(:first, :last, :email, :password)");
    $requete ->execute(
        [
            "first"=>$firstname,
            "last"=>$lastname,
            "email"=>$email,
            "password"=>$password,
        ]
        );

}

header("Location:connexion.php");

?>