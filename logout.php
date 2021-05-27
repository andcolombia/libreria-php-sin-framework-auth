<?php
require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
use Jumbojett\OpenIDConnectClient;
session_start() ;
$oidc = new OpenIDConnectClient('https://qaautenticaciondigital.and.gov.co',
                                'phpDev',
                                null);

$oidc->setRedirectURL('http://localhost:3000/login.php');
$oidc->setCodeChallengeMethod('S256');
$idtoken = $_SESSION["id_token"];

session_destroy();

//Header('Location: '."index.php");
$oidc->signOut($idtoken,  "http://localhost:3000/index.php");

?>

