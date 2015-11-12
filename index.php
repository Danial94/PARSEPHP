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
        if (!empty($login_name)) {
            
            $query = new ParseQuery("LogIn");
            $query->equalTo("loginName", $login_name);
            
            $result = $query->first(); // There are 2 - Find and First
            // 'Find' means any objects that has the same login name and stuff like that
            // 'First' means only 1 objects from the top
            
            if (empty($result)) {
                $display = "Empty";
            } else {
                $display = $result->get("loginName"); // If use 'First' then straight get the result - no array
            }
            
            /*
            for ($i = 0; $i < count($result); $i++) {
                $object = $result[$i];
                echo $object->get("loginName");
            }
            */
            // Above code is when you use 'Find' instead 'First' - got array
            
            // header("Location: http://localhost/PARSEPHP/mainpage.php");
            // exit;
            
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
                            <td><input name="login_pass" type="password" placeholder="IGNORE THIS!"></td>
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