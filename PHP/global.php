<?php
use Movies as movies;

define('I', 'inc/');

require_once I . 'connect.php';

$db = new movies\Connect();
$users = new movies\Users();

session_start();

function my_autoloader($class) {
    include 'classes/' . $class . '.php';
}