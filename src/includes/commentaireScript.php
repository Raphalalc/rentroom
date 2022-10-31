<?php if(isset($_POST['add_comment'])){
    $scoreVerification = $_POST['score'];
       error_reporting (E_ALL ^ E_NOTICE); 
        if($_SESSION['id']==null){
            flashComment('Vous devez être connecté pour poster un commentaire <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>');
        }
        elseif(empty($_POST['score'])){
            flashComment('Veuillez remplir tous les champs <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>');
        }
        elseif($scoreVerification < 0 || $scoreVerification > 10 || empty($_POST['score'])){
            flashComment('Vous devez attribuer une note entre 0 et 10 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>');
        }
       
       else{
            flashComment('Envoie réussi');
        $comment = htmlspecialchars($_POST['comment'],ENT_QUOTES);
        $commentlash = addslashes($comment);
        $score = htmlspecialchars($_POST['score']);
        $user_id = $_SESSION['id'];
        $room_id = $_GET['room_id'];
        $add_comment = $dbh->query("INSERT INTO `feedback` (`user_id`, `room_id`, `comment`, `score`) VALUES (' $user_id', '$room_id', '$commentlash', '$score')");
        $dbh->exec('$add_comment');    
        header("Refresh:1");
          }
       
     };
?>