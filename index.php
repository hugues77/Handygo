<?php
/**
 * Quelques Require Importants
 */
session_start();
require_once 'vendor/autoload.php'; 
require_once 'functions/main.php';
require_once 'functions/functions.php';
// require_once 'ajax/function.php';

//Initialiser date en francais
setlocale(LC_TIME, 'fr.utf8');
// setlocale(LC_ALL, 'fr_FR.UTF8', 'fr_FR','fr','fr','fra','fr_FR@euro');

/**
 * Initialization du AltoRouter
 */
$router = new AltoRouter();
/**
 * création des URL /ROUTER
 */
$router->map('GET|POST','/','home');
$router->map('GET','/user-login','register');
$router->map('GET','/abonnes','member');
$router->map('GET','/logout/[i:user_id]','logout');
$router->map('GET','/logout_ref','logout_ref');
$router->map('GET','/delete/[i:user_id]','delete_user');
$router->map('GET|POST','/annonces','annonces');
$router->map('GET|POST','/offres','offres');
$router->map('GET|POST','/trip/[*:voy_id]','trip', 'trip');
$router->map('GET|POST','/booking/book-luggage','booking/book-luggage'); 
$router->map('GET|POST','/booking/modify-booking','booking/modify-booking'); 
$router->map('GET|POST','/booking/modify-trip','booking/modify-trip'); 
$router->map('GET|POST','/user/[i:user_id]','user', 'user');
$router->map('GET|POST','/test','test');
$router->map('GET|POST','/informations/avis/[i:user_id]','informations/avis');
$router->map('GET|POST','/report/trip-alert','report/trip-alert');
$router->map('GET|POST','/report/report','report/report');
$router->map('GET|POST','/offres/summary','summary');
$router->map('GET|POST','/post-trip','post-trip');
$router->map('GET|POST','/form','form');
$router->map('GET|POST','/reclammation','reclammation');
$router->map('GET|POST','/messages/list','messages/list');
// $router->map('GET|POST','/ajax/users-list','ajax/users-list');
$router->map('GET|POST','/informations/avatar','informations/avatar');
$router->map('GET|POST','/informations/naissance','informations/naissance');
$router->map('GET|POST','/informations/name','informations/name');
$router->map('GET|POST','/informations/telephone','informations/telephone');
$router->map('GET|POST','/informations/forgot_password','informations/forgot_password');
$router->map('GET|POST','/informations/complete_user','informations/complete_user');
$router->map('GET|POST','/informations/information_user','informations/information_user');

$router->map('GET|POST','/abonnes/help','partials_members/help');
$router->map('GET|POST','/abonnes/profil','partials_members/profil');
$router->map('GET|POST','/abonnes/setting','partials_members/setting');
$router->map('GET|POST','/abonnes/trajets','partials_members/trajet');


$router->map('GET|POST','/messages/chat/[i:user_id]','messages/chat','chat');
$router->map('GET|POST','/booking/[*:slug]/[i:id]','/booking/article');

$match = $router->match();

if(is_array($match)){
    
    if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
    }else{
        $params = $match['params'];
        ob_start();
        require_once "pages/{$match['target']}.php";
        $content = ob_get_clean();
    }
    require_once 'layout/header.php';   
    
}else{
    require_once 'layout/header.php'; 
    require_once 'pages/error.php'; 
}
require_once 'layout/footer.php';
