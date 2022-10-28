<?php

// flash message
function flash($message)
{
    $_SESSION['flash'] = ['message' => $message,];
}

function flashConnexion($message)
{
    $_SESSION['flashConnexion'] = ['message' => $message,];
}