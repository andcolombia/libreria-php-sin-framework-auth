<?php

// Comment these lines to hide errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'includes/config.php';
require 'includes/functions.php';
session_start();
//init();
?>

<html>
<body>
<?php if((!isset($_SESSION["id_token"]) || trim($_SESSION["id_token"] == ''))){ ?>
    <a href="login.php">Iniciar sesion </a>
<?php } else{ 
    
    echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
    ?>


<a href="logout.php">Cerrar sesion </a>
    <?php } ?>
</body>
</html>