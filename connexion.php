<?php 
session_start();
require('./includes/database.php');



if(isset($_POST['envoi'])){
    if(!empty($_POST['username']) AND !empty($_POST['first_name'])AND !empty($_POST['last_name'])AND !empty($_POST['email'])AND !empty($_POST['password'])){
    $user_name = htmlspecialchars($_POST['username']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars( $_POST['last_name']);
    $email = htmlspecialchars( $_POST['email']);
    $password =sha1($_POST['password']);

echo 'New record created successfully';
    }else{
        echo 'Veuillez remplir tous les champs';
    }
}

?>

<html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="" align="center">
    
        <input type="text" name="username" placeholder="Username">
        
        <input type="text" name="first_name" placeholder="First name">

        <input type="text" name="last_name" placeholder="Last name">

        <input type="email" name="email" placeholder="Email" required>
        
        <input type="password" name="password" placeholder="Password">

        <input type="submit" name='envoi' >
    </form>   



</body>
</html>
