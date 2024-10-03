<?php
session_start();
// LE DAMOS LA BIENVENIDA AL USUARIO SI LA SESSION FUE INICIADA
if (isset($_SESSION['user']) && !empty($_SESSION['user']))
{
    echo "<br> WELCOME: {$_SESSION['user']['name']} <br> <br>";
}

// EN CASO CONTRARIO LO DEVOLVERA A LA PANTALLA PRINCIPAL
else{
    header('Location: Index-post.php');
}
?>

<!---------FORM PARA CERRAR SESSION------------->
<form action="sesion_cerrada.php" method = "POST">
    <input type="submit" value = "Cerrar Sesion">
</form>

<!---------FORM PARA BLOQUEAR SESSION------------->
<form action="Sesion_bloqueada.php" method = "POST">
    <input type="submit" value = "Bloquear Sesion">
</form>

<!---------FORM PARA CREAR POST------------->
<form action="" method = "POST">
    <input type="text" name = "title" placeholder = "Title">
    <input type="text" name = "body" placeholder = "Body">
    <input type="submit" value = "Crear Post">
</form>

<?php
if (isset($_COOKIE['user']))
{
    $conversion = json_encode($_COOKIE['user'],true);
}

if ( isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['body']) && !empty($_POST['body']))
    {
        $Title = htmlspecialchars($_POST['title']);
        $Body = htmlspecialchars($_POST['body']);
        $Index = $_SESSION['user']['id'];

        $Post[] = 
        [
            'id_user' => $Index,
            'Title' => $Title,
            'Body' => $Body,
        ];
        setcookie('user_post',$conversion, time() + 3600);
    }
?>

<?php
if (isset($Post))
{
    echo "MIS POST <br> <br>";
    foreach ($Post as $Blog)
    {
        echo "TITLE: {$Blog['Title']} <br>";
        echo "BODY: {$Blog['Body']} <br> <br>";
    }

}
?>
