<?php
session_start();
require('./includes/database.php');
require('./includes/flash.php');

$req = $dbh->query("SELECT r.*, s.*
FROM `slot` s 
LEFT JOIN `room` r 
ON s.`room_id` = r.`id`
WHERE s.`status`='libre' AND s.`arrival_date` >= CURDATE() ");
$result = $req->fetchAll();  

      
//   FONCTION RECHERCHE
    if(isset($_POST['research'])){
        if(!empty($_POST['rechercheSalon'])){
        $req = $dbh->query("SELECT r.*, s.*
        FROM `slot` s 
        LEFT JOIN `room` r 
        ON s.`room_id` = r.`id`
        WHERE s.`status`='libre' && r.`name` LIKE '".$_POST['rechercheSalon']."%'");
        $result = $req->fetchAll();  
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="./assets/meeting.png" />
    <title>rentroom | Raphael Alcantara</title>

</head>
<body>
    <?php require('./includes/popupInscription.php') ?>
    <?php require('./includes/popupConnexion.php') ?>
    <?php require('./includes/nav.php') ?>
<main>
<div class="containerCard">
<?php foreach($result as $roomSlot): ?>
<div data-aos="fade-up" data-aos-anchor-placement="top-bottom">
    <div class="Card">
        <a href="location.php?id=<?= $roomSlot['id']?>&city=<?= $roomSlot['city']?>&room_id=<?= $roomSlot['room_id']?> "> 
        <div class="imgCard">
            <img src="<?= $roomSlot['picture_url'] ?>" alt="room">
        </div>
        <div class="headerCard">
            <p><?= $roomSlot['name'].' ' ?></p>
            <p><?=  $roomSlot['price'].' €'?></p>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FDA11C" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
           <p id="note"><?= rand(10, 49)/10; ?></p>
           
        </div>

        <div class="bodyCard">
            <p><?= $roomSlot['description'] ?></p>
        </div>
        
        <div class="footerCard">
            <img width="30" height="30" src="assets/calendar.png" alt="calendar">
            <p>
            <?php
             $createDate = $roomSlot['departure_date'] ;
             $date = date("d/m/Y", strtotime($createDate));
             echo $date.' au';
            ?>

            <?php 
              $createDate = $roomSlot['arrival_date'] ;
              $date = date("d/m/Y", strtotime($createDate));
              echo $date;
            ?>
            </p>
            </a>
            </div>
        </div>
        </div>
          <?php endforeach; ?>
          
     </div>
        </main>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>AOS.init(); </script>
            <script src="./script/menu.js"></script>
    </body>
</html>