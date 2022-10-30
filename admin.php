<?php 
session_start();
require('./includes/database.php');

if($_SESSION['email']!= 'admin@gmail.com'){
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/global.css">
    <title>rentroom | admin</title>
</head>
<body>
<?php require('./includes/popupInscription.php') ?>
<?php require('./includes/popupConnexion.php') ?>
<?php require('./includes/nav.php') ?>
    <main>
        <h2>Page admin</h2>
    </main>
    <script src="./script/menu.js"></script>
</body>
</html>