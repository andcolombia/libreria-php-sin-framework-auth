<?php
require __DIR__ . '/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
use Jumbojett\OpenIDConnectClient;

$oidc = new OpenIDConnectClient('https://qaautenticaciondigital.and.gov.co',
                                'phpDev',
                                null);

$oidc->setRedirectURL('http://localhost:3000/login.php');
$oidc->setCodeChallengeMethod('S256');
$oidc->authenticate();

$userInfo= $oidc->requestUserInfo();

$nameJson = json_encode($userInfo);

$idtoken = $oidc->getIdToken();
$accessToken = $oidc->getAccessToken();

    //session_start();
    $_SESSION["id_token"] = $idtoken;
    //$__SESSION["name"] = $name;
    $_SESSION["userinfo"] = $userInfo;


    
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
Header('Location: '."index.php");
?>

