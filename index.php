<?php

$_SERVER['REQUEST_URI_PATH'] = preg_replace('/\?.*/', '', $_SERVER['REQUEST_URI']);
$query = explode('/', trim($_SERVER['REQUEST_URI_PATH'], '/'))[0];

$suggestions = file_get_contents('http://suggestqueries.google.com/complete/search?client=firefox&q='.$query);
$results = json_decode($suggestions)[1];

echo json_encode($results);


?>
