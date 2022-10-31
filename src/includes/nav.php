
<nav class="navigation">
    <div class="parent">
     <div class="div1"> 
    <a href="index.php">   
         <img src="./assets/meeting.png" alt="meeting icon" width="45" height="45">
    </a>
    <a href="index.php">   
             <p id="title">rentroom</p>
    </a>
</div> 

<div class="div2">
        <form method="post">
                <input name="rechercheSalon" type="text" placeholder="Recherchez votre salon"> 
                <button type="submit" name="research" class="circle">
                        <svg width="23" height="23" color="#61016B" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.92 20.1625L17.7118 15.9666C19.0695 14.2368 19.8063 12.1008 19.8035 9.90176C19.8035 7.94338 19.2228 6.02898 18.1348 4.40064C17.0468 2.7723 15.5003 1.50317 13.691 0.753731C11.8817 0.00429024 9.89078 -0.191798 7.97002 0.190264C6.04927 0.572325 4.28495 1.51538 2.90016 2.90016C1.51538 4.28495 0.572325 6.04927 0.190264 7.97002C-0.191798 9.89078 0.00429024 11.8817 0.753731 13.691C1.50317 15.5003 2.7723 17.0468 4.40064 18.1348C6.02898 19.2228 7.94338 19.8035 9.90176 19.8035C12.1008 19.8063 14.2368 19.0695 15.9666 17.7118L20.1625 21.92C20.2775 22.036 20.4144 22.1281 20.5652 22.1909C20.7161 22.2538 20.8778 22.2861 21.0412 22.2861C21.2046 22.2861 21.3664 22.2538 21.5172 22.1909C21.6681 22.1281 21.805 22.036 21.92 21.92C22.036 21.805 22.1281 21.6681 22.1909 21.5172C22.2538 21.3664 22.2861 21.2046 22.2861 21.0412C22.2861 20.8778 22.2538 20.7161 22.1909 20.5652C22.1281 20.4144 22.036 20.2775 21.92 20.1625ZM2.47544 9.90176C2.47544 8.43297 2.91099 6.99717 3.727 5.77592C4.54302 4.55467 5.70285 3.60282 7.05983 3.04074C8.41681 2.47866 9.91 2.33159 11.3506 2.61814C12.7911 2.90468 14.1144 3.61197 15.153 4.65056C16.1915 5.68915 16.8988 7.01239 17.1854 8.45296C17.4719 9.89352 17.3249 11.3867 16.7628 12.7437C16.2007 14.1007 15.2489 15.2605 14.0276 16.0765C12.8064 16.8925 11.3705 17.3281 9.90176 17.3281C7.93218 17.3281 6.04327 16.5457 4.65056 15.153C3.25786 13.7603 2.47544 11.8713 2.47544 9.90176Z" fill="white"/>
                        </svg>    
                </button>
        </form>
</div>
<div class="div3">
<?php if(isset($_SESSION['id'])): ?>
                        <div class="login"> <?= $_SESSION['username'] ?></div>
<?php endif ?>
        <div class="dropdown">
                <div class="mini_menu">
                <img src="./assets/menu.png" width="27" height='27' alt="icon menu">
                <img id="person" src="./assets/icon_person.png" width="20" height='24' alt="icon person" >
                </div>
        <div class="dropdown-content">
      
        <?php if(isset($_SESSION['id'])): ?>
                <p id="profil" ><?= 'Profil : ' .$_SESSION['username'] ?> </p>
        <?php endif ?>
                
                <p><a href="#suscribe">Inscription</a></p>
                <p><a href="#connexion">Connexion</a></p>
       <form method="post">
               <input type="submit" name="button1"
                value="Déconnexion"/>
        </div>
</div>

    </div>    
</div>
</div>
</div>
</nav>