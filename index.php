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

// REGISTER BUTTON
if (isset($_POST['login_registerButton'])) {
    header("Location: http://localhost/PARSEPHP/register.php");
    exit;
}

// LOGIN BUTTON
if (isset($_POST['login_loginButton'])) {

    $login_name = $_POST['login_name'];
    $login_pass = $_POST['login_pass'];

    // ERROR CHECKING
    if (!empty($login_name) && !empty($login_pass)) {
        
    try {
        $user = ParseUser::logIn($login_name, $login_pass);
        if (!empty($user)) {
            header("Location: http://localhost/PARSEPHP/mainpage.php");
            exit;
        }
    } catch (ParseException $error) {
        $display = "No User Exists";
    }
        
    } else {
        $login_error = "Your Form is Invalid";
    }
}
?>

<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="PHPCSS.css">
    </head>
        
    <body>
        <center>
            <div class="div1">
                
                <form method="POST">
                    
                    <h1>PHP Chat System</h1>
                    
                    <table class="table1">
                        <tr>
                            <td>Login</td>
                            <td><input name="login_name" type="text"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input name="login_pass" type="password"></td>
                        </tr>
                    </table>
                    
                    <table class="table2">
                        <tr>
                            <td><input type="submit" name="login_loginButton" value="Login"></td>
                            <td><input type="submit" name="login_registerButton" value="Register"></td>
                        </tr>
                    </table>
                    
                </form>
                
            </div>
            
            <h2><?php echo $login_error ?></h2>
            <h2><?php echo $display ?></h2>
            
        </center>
    </body>
    
</html>