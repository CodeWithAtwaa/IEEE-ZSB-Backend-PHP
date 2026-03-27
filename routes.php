<?php


// return [
//     '/' => "Controllers/index.php",
//     '/about' => "Controllers/about.php",
//     '/contact' => "Controllers/contact.php",
//     '/notes' => "Controllers/notes/index.php",
//     '/note' => "Controllers/notes/show.php",
//     '/notes/create' => "Controllers/notes/create.php",
// ];

$router->get('/', 'Controllers/index.php');
$router->get('/about', 'Controllers/about.php');
$router->get('/contact', 'Controllers/contact.php');


$router->get('/notes', 'Controllers/notes/index.php');
$router->get('/note', 'Controllers/notes/show.php');
$router->delete('/note', 'Controllers/notes/destory.php');

$router->get('/notes/create', 'Controllers/notes/create.php');
$router->post('/notes', 'Controllers/notes/store.php');

