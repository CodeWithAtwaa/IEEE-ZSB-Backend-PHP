<?php
// return  [
//     '/' => 'index.php',
//     '/about' => 'about.php',     
//     '/notes' => 'notes/index.php'
//     '/notes/delete' => 'notes/delete.php',
//     '/note' => 'notes/show.php',
//     '/note/delete' => 'notes/delete.php',
//     '/note/create' => 'notes/create.php',
//     '/contact' => 'contact.php'
// ];


$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/notes/delete', 'notes/delete.php');
$router->get('/note', 'notes/show.php');

$router->delete('/note/delete', 'notes/delete.php');
$router->get('/note/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');
$router->get('/note/edit', 'notes/edit.php');    
$router->patch('/note/update', 'notes/update.php');    


$router->get('/contact', 'contact.php');


// Auth routes
$router->get('/register', 'registeration/create.php')->only('guest');
$router->post('/register', 'registeration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');
