<?php
session_start();
require_once "index.php";
?>
<?php

    $email = $_POST['email'];
    $password = $_POST['password'];

       
$sql = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
$instruction = "SELECT * FROM `user` WHERE email = :email ";
$prepare1 = $sql->prepare($instruction);
$prepare1->execute(array(':email'=> $email));


try {
    $bd = new PDO(dsn:"mysql:host=localhost:3306;dbname=blog",username:"root",password:"root");
    $bd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException) {
    echo "Erreur :" .$e->getMessage();
}


   //Vérifications des données saisies par l'utilisateur

   if ($email!='' && $password!='' && $blog = $prepare1->fetch(mode: PDO :: FETCH_ASSOC)) {

        //les éléménts à vérifier.
        $request = $bd->prepare("SELECT * FROM user WHERE email=:email AND password=:password");
        $request->execute([
            "email" => $email,
            "password" => $password
        ]);
        //Récuperer les éléments vérifiés 
        $respond =$request -> fetch();

        if (is_array($respond)===true) {
            $_SESSION['id']=$blog['id'];
            $_SESSION['is_admin']=$blog['is_admin'];
            header("Location: home.php"); 
        }else {
            $error_msg = "Email ou Password invalide";
            header("Location: index.php ? error{$error_msg}");
        }
   }


?>