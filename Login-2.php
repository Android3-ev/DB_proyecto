<?php
session_start();
require_once "./db/db.php";
if (isset($_POST['password']) && !empty($_POST['password']) && $_POST['password'] == $_SESSION['user']['password']){
    $colums = 0;
    $User_unlokeck = $_POST['password'];

    foreach ($Users as $user)
    {
        if ($user['password'] == $User_unlokeck)
        {
            $colums = 1;
            break;
        }
    }
    if ($colums == 1)
    {
        $SESSION['user'] = $user;
        header(header: 'location: welcome.php');
        
    }
} 
elseif (isset($_POST['password']) && empty($_POST['password']))
{
    echo "El Campo no puede estar vacío";
}
elseif ($_POST['password'] != $_SESSION['user']['password'])
{
    echo 'Contraseña incorrecta';
}

?>