<?php

require 'initialise.php';

$username = $_POST["user"];
$pass = $_POST["pass"];

use Parse\ParseUser;

if(isset($_POST['login'])){
	
	try {
		
	  $user = ParseUser::logIn($username, $pass);
	  // Do stuff after successful login.
  
	  header('Location: chat.html');
  
	} 

	catch (ParseException $error) {
	  // The login failed. Check error to see why.
	}
	
}

if(isset($_POST['signup'])){
	
$user = new ParseUser();
$user->set("username",$username);
$user->set("password",$pass);

	try {
		
	  $user->signUp();
	  // Hooray! Let them use the app now.
	  
	  header('Location: index.html');
	  
	} 

	catch (ParseException $ex) {
		
	  // Show the error message somewhere and let the user try again.
	  echo "Error: " . $ex->getCode() . " " . $ex->getMessage();
	  
	}

}

?>