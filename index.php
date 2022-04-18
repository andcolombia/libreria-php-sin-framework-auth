<?php

// Comment these lines to hide errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/config.php';
require 'includes/functions.php';
session_start();
if(isset($_SESSION["urlRedirect"])){
    unset($_SESSION["urlRedirect"]);
}
else{
   echo "<script>location.href='validateSession.php?url=".$_SERVER['REQUEST_URI']."';</script>";
}
?>

<html>
<body>
<?php if((!isset($_SESSION["id_token"]) || trim($_SESSION["id_token"] == ''))){ ?>
    <a href="login.php?type=login">Iniciar sesion </a><br/>
    <a href="login.php?type=register">Registrarse </a>
<?php } else{ 
    
    echo '<pre>';
    var_dump($_SESSION);
    echo '</pre>';
    ?>

<a href="validateSession.php?type=manage">Personalizar </a>
<br/>
<a href="logout.php">Cerrar sesion </a>
    <?php } ?>
</body>
</html>