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

       flash('Nouvelle inscription créée avec succès.');
    }else{
        flash('Veuillez remplir tous les champs <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg>');
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

           <div class="alerts">
           
               <?php if(isset($_SESSION['flash'])): ?>
                <?php foreach($_SESSION['flash'] as $flash): ?>
                    <?= "<div class=flash>{$flash} </div>" ?>
                   <?php endforeach; ?>
                   <?php endif ?>
                
           </div>
        </div>
        </form>   
       
    </div>
</div>