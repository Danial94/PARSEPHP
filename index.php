<?php

require 'initialize.php';

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;

// ERROR Variable
$login_error = null;
$display = null;

// LOGIN BUTTON
if (isset($_POST['login'])) {

    $login_name = $_POST['user'];
    $login_pass = $_POST['pass'];
    
    try {
        $user = ParseUser::logIn($login_name, $login_pass);
        if (!empty($user)) {
            header("Location: http://localhost/PARSEPHP/mainpage.php");
            exit;
        }
    } catch (ParseException $error) {
        $display = "No User Exists";
    }
}

// REGISTER BUTTON
if (isset($_POST['signup'])) {

    $regist_username = $_POST['user'];
    $regist_pass = $_POST['pass'];

    if (!empty($regist_username) && !empty($regist_pass)) {
        
        $user = new ParseUser();
        $user->set("username", $regist_username);
        $user->set("password", $regist_pass);
        $user->signUp();
        
        header("Location: http://localhost/PARSEPHP/index.php");
        exit;
    }
}

require 'index.html';
?>