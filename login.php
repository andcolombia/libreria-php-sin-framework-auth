<?php
require __DIR__ . '/vendor/autoload.php';
require 'includes/config.php';
require 'includes/functions.php';
error_reporting(E_ALL);
ini_set('display_errors', 'On');
use Jumbojett\OpenIDConnectClient;
session_start();

if(isset($_GET["error"]))
{
    if($_GET["error"] == 'login_required'){
        Header('Location: '.'logout.php' );
    }
    
}

if(!isset($_SESSION["urlRedirect"]) ){
    $oidc = new OpenIDConnectClient('https://qaautenticaciondigital.and.gov.co', 
    'phpDev',
    null);

$oidc->setRedirectURL('http://localhost:3000/login.php');
$oidc->setCodeChallengeMethod('S256');
$oidc->addScope('co_scope');
if(isset($_GET["type"])){
    $oidc->addAuthParam(array('acr_values'=>'action:'. $_GET["type"]));
}

$oidc->authenticate();

$userInfo= $oidc->requestUserInfo();

$nameJson = json_encode($userInfo);

$idtoken = $oidc->getIdToken();
$accessToken = $oidc->getAccessToken();

if($_REQUEST['code']){
$_SESSION["code"] = $_REQUEST['code'];
}
if($_REQUEST['scope']){
$_SESSION["scope"] = $_REQUEST['scope'];
}
if($_REQUEST['scope']){
$_SESSION["state"] = $_REQUEST['state'];
}
if($_REQUEST['session_state']){
$_SESSION["session_state"] = $_REQUEST['session_state'];
}

$_SESSION["id_token"] = $idtoken;
$_SESSION["accesstoken"] = $accessToken;
$_SESSION["userinfo"] = $userInfo;

Header('Location: '.'index.php' );
}
else{
    Header('Location: '.$_SESSION["urlRedirect"] );
}



    

?>


