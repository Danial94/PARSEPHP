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
$regist_error = null;

// REGISTER BUTTON
if (isset($_POST['regist_registerButton'])) {

    $regist_username = $_POST['regist_username'];
    $regist_pass = $_POST['regist_password'];
    $regist_repass = $_POST['regist_repassword'];

    if ($regist_pass != $regist_repass) {
        $pass = null;
    }

    if (!empty($regist_username) && !empty($regist_pass) && !empty($regist_repass)) {
        
        $user = new ParseUser();
        $user->set("username", $regist_username);
        $user->set("password", $regist_pass);
        $user->signUp();
        
        header("Location: http://localhost/PARSEPHP/index.php");
        exit;
    } else {
        $regist_error = "Your Form is Invalid";
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
                    
                    <h1>PHP Register</h1>

                    <table class="table1">
                        <tr>
                            <td>Login Name</td>
                            <td><input name="regist_username" type="text"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input name="regist_password" type="password"></td>
                        </tr>
                        <tr>
                            <td>Re-enter Password</td>
                            <td><input name="regist_repassword" type="password"></td>
                        </tr>
                    </table>

                    <table class="table2">
                        <tr>
                            <td><input type="submit" name="regist_registerButton" value="Register"></td>
                        </tr>
                    </table>
                
                </form>
            
            </div>
            
            <h2><?php echo $regist_error ?></h2>
            
        </center>
    </body>
    
</html>