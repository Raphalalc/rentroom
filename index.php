<?php
session_start();
require('./includes/database.php');
require('./includes/flash.php');

$req = $dbh->query("SELECT r.*, s.*
FROM `slot` s 
LEFT JOIN `room` r 
ON s.`room_id` = r.`id`
WHERE s.`status`='libre'");
$result = $req->fetchAll();  

$moyenne  = $dbh->query("SELECT AVG(`score`) 
    FROM slot 
    JOIN room 
    ON slot.room_id = room.id 
    JOIN feedback 
    ON feedback.room_id = room.id ");
    $resultMoyenne  = $moyenne ->fetchAll();  
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
        <a href="location.php?id=<?= $roomSlot['id']?>&city=<?= $roomSlot['city']?> "> 
        <div class="imgCard">
            <img src="<?= $roomSlot['picture_url'] ?>" alt="room">
        </div>
        <div class="headerCard">
            <p><?= $roomSlot['name'].' ' ?></p>
            <p><?=  $roomSlot['price'].' €'?></p>
            
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