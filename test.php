<?php

// require 'view/mainmenu.html';
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

/*
CREATING CLASS AND OBJECT DEMO
$testObject = ParseObject::create("TestObject");
$testObject->set("foo", "bar");
$testObject->set("foo", "bar");
$testObject->save();
*/

/*
ADDING OBJECT INTO CLASS
$people_stuff = new ParseObject("people_stuff");
$people_stuff->set("login_name", "Jeremy Lee");
$people_stuff->set("password", "1234");
$people_stuff->save();

/*
RETRIVING OBJECT
$people_query = new ParseQuery("people_stuff");
$objectID = $people_query->get("Yk4LwJhwRb");
$name = $objectID->get("login_name");
echo $name;
*/

// FETCHING ALL OBJECTS BY OBJECT ID
$query = new ParseQuery("people_stuff");
$query->exists("objectId");
$result = $query->find();

for ($i = 0; $i < count($result); $i++) {
	$object = $result[$i];
	echo $object->get("login_name") . "\n";
}
?>