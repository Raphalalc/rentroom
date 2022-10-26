<?php 

if(isset($_POST['envoi'])){
    if(!empty($_POST['username']) AND !empty($_POST['first_name'])AND !empty($_POST['last_name'])AND !empty($_POST['email'])AND !empty($_POST['password'])){
    $user_name = htmlspecialchars($_POST['username']);
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars( $_POST['last_name']);
    $email = htmlspecialchars( $_POST['email']);
    $password =sha1($_POST['password']);

    $inscription = $dbh->query("INSERT INTO `user`(`username`, `first_name`, `last_name`, `email`, `password`) VALUES ('$user_name','$first_name','$last_name','$email','$password')");
    $dbh->exec('$inscription');    

echo 'New record created successfully';
    }else{
        echo 'Veuillez remplir tous les champs';
    }
}
?>

<div class="overlay" id="suscribe">
    <div class="suscribe">
            <h2>Inscription</h2>
            <a href="#" class="cross">&times</a>
            <div class="form_suscribe">
            <form method="post" >
    
            <input type="text" name="username" placeholder="Username">
            
            <input type="text" name="first_name" placeholder="First name">

            <input type="text" name="last_name" placeholder="Last name">

            <input type="email" name="email" placeholder="Email" required>
            
            <input type="password" name="password" placeholder="Password">
            </div>
           <button name="envoi">S'inscrire</button>
        </form>   
       
    </div>
</div>