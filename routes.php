<?php
$router->get('/', 'Controllers/index.php');
$router->get('/about', 'Controllers/about.php');
$router->get('/contact', 'Controllers/contact.php');


$router->get('/notes', 'Controllers/notes/index.php');
$router->delete('/note', 'Controllers/notes/destory.php');

$router->get('/notes/create', 'Controllers/notes/create.php');
$router->post('/notes', 'Controllers/notes/store.php');

$router->get('/note', 'Controllers/notes/show.php');
$router->get('/note/edit', 'Controllers/notes/edit.php');
$router->patch('/note', 'Controllers/notes/update.php');


$router->get('/register' , 'Controllers/registration/create.php');
$router->post('/register' , 'Controllers/registration/store.php');

$router->get('/login', 'Controllers/sessions/create.php');
$router->post('/login', 'Controllers/sessions/store.php');
$router->delete('/logout', 'Controllers/sessions/destroy.php');