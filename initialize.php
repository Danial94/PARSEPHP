<?php
require 'autoload.php';

use Parse\ParseClient;

$app_id = 'oko7zWTrRyuQpjreYa1hE4yBPJS2ifgu3eveYzVv';
$rest_key = 'kqCnblmOzIybIlKcC7G9p9wOhlFtGYxQDmXB53zT';
$master_key = 'GZMbcQBvvotXsyNkWu2UPd6z6wOqjkyFgp5Pb6jx';

ParseClient::initialize($app_id, $rest_key, $master_key);
?>