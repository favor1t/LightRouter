<?php
include '_autoload.php';

$route = new Router\Route();

$route->add('/', 'Home');
$route->add('/about', 'About');
$route->add('/contact', 'Contact');
$route->submit();
