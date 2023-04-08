<?php
    $getpage= $_GET["page"];
    if ($getpage == 'home') include'home.php';
    elseif($getpage == 'about') include'about.php';
    elseif($getpage == 'contact') include 'contact.php';
    elseif($getpage == 'products') include 'products.php';
    elseif($getpage == 'login') include 'admin/authen/login.php';
    elseif($getpage == 'register') include 'admin/authen/register.php';
    elseif($getpage == 'logout') include 'logout.php';
    

?>