<?php

// CREAMOS O INICIAMOS UNA SESSION SI LOS CAMPOS NO SON NULL
session_start ();
require_once "./db/db.php";
if ( isset($_POST['user']) && !empty($_POST['user'])
&& isset($_POST['password']) && !empty($_POST['password']) )
{
    $row = 0;
    $User_name = $_POST['user'];
    $security = $_POST['password'];

    // RECORRREMOS EL ARRAY PARA VERIFICAR QUE LOS DATOS INGRESADOS COINCIDAN
    foreach ($Users as $user)
    {
        if ($user['user'] == $User_name && $user['password'] == $security)
        {
            $row = 1;
            break;
        }
    }

    // SI LOS DATOS SON CORRECTOS CREAMOS UNA COOKIES PARA EL USUARIO Y SU SESSION SERA INICIADA
    if ($row == 1)
    {
        $_SESSION['user'] = $user;
        setcookie('user', $user['user'], time() + 3600);
        header(header: 'location: welcome.php');
    }

    // EN CASO CONTRARIO ENVIARA ESTE MENSAJE
    else {
        echo "Usuario o contraseña incorrectos";
    }
}

// MENSAJE POR SI LOS CAMPOS SON NULOS
else {
    echo "No puede haber campos vacíos";
}

