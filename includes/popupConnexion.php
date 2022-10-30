<?php
    if(isset($_POST['connexion'])){
       if(!empty($_POST['email']) && (!empty($_POST['password']))){
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $login = "SELECT * FROM `user` WHERE `email`=? AND `password`=? ";
        $resultLogin = $dbh->prepare($login);
        $resultLogin->execute(array($email ,$password));
        $row =  $resultLogin->rowCount();
        $fetch =$resultLogin->fetch();
       
        if($row > 0) {
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['username'] = $fetch['username'];
            $_SESSION['first_name'] = $fetch['first_name'];
            $_SESSION['last_name'] = $fetch['last_name'];
            $_SESSION['email'] = $fetch['email'];
        flashConnexion('Connexion réussie.');
        if($_SESSION['email']== 'admin@gmail.com'){
            header('location:admin.php');
            
        }
    } 
   
       }else{
        flashConnexion('Connexion invalide.');
 
       }
    }
    if(isset($_POST['button1'])) {
        session_unset(); 
        header('location:index.php');}
?>

<div class="overlay" id="connexion">
    <div class="suscribe">
            <h2>Connexion</h2>
            <p>Ecrivez votre adresse-email et votre mot de passe pour vous connecter.</p>
            <a href="#" class="cross">&times</a>
            <div class="form_suscribe">
            <form method="post" >
    
            <input type="email" name="email" placeholder="Email" required>
            
            <input type="password" name="password" placeholder="Password">
            </div>
           <button name="connexion">Se connecter</button>

           <?php if(isset($_SESSION['flashConnexion'])): ?>
                <?php foreach($_SESSION['flashConnexion'] as $flash): ?>
                    <?= "<div class=flash>{$flash} </div>" ?>
                   <?php endforeach; ?>
            <?php endif ?>
        </form>   
       
    </div>
</div>


