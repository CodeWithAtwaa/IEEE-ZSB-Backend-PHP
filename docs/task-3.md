# The Documentation

## Running the Project

Start PHP's built-in server:

```bash
php -S localhost:8000 -t public
```

## Autoloading Classes

The application automatically loads classes using PHP's spl_autoload_register.

```php
spl_autoload_register(function ($class) {

    $path = base_path(str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php');

    if (file_exists($path)) {
        require $path;
    }

});
```

---

## # Application Entry Point

All requests enter the application through:
`Responsibilities`:

- Start the session
- Load helper functions
- Register autoloading
- Load the router

```php
session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

require base_path('Core/router.php');
```

---

## Helper Functions

Helper functions simplify repetitive tasks.

```php
function base_path($path = '')
{
return BASE_PATH . $path;
}
```

---

## Routing

The router maps URLs to controllers.
Routes are defined in:

`routes.php`

```php
return [

"/" => "Controllers/index.php",

"/notes" => "Controllers/notes/index.php",

"/notes/create" => "Controllers/notes/create.php",
];
```

`Router logic`:

- Read the current URL
- Check if the route exists
- Load the controller
- Otherwise return 404

```php
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($uri, $routes)) {
require base_path($routes[$uri]);
} else {
abort();

}
```

<hr>

## Nampespacing, What, Why.

_Namespace_ : PHP namespaces are used to prevent naming conflicts between classes, interfaces, functions, and constants.

### Why Use Namespaces?

- To avoid name conflicts, especially in larger projects
- To organize code into logical groups
- To separate your code from code in libraries
- To allow the same name to be used for more than one class, without conflict

### Declaring a Namespace

The namig of namespace you should make it as a Folder Name.

```php
namespace Core;
```

### Using Namespaces

```php
use Core\Database;
```

### Namespace Alias

- It can be useful to give a namespace or class an alias to make it easier to write. This is done with the use keyword:

```php
use Core\Databse as db;
$table = new db\Table();
```
--------- 

## Delete existing note
- To delete note by 3 steps:

1. make button to delete as a *form*.
```php
 <form method="POST" class="my-6">
            <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
            <button class="inline-block px-3 py-1 text-xs font-medium text-red-200 bg-red-500 rounded hover:bg-red-600 transition">Delete</button>
        </form>
```

2. check if existing note first, and delete it.
```php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $db->query("DELETE FROM notes WHERE id=:id", [
        'id' => $_GET['id']
    ]);
```

3. redirct to man notes or index page.
```php
    header('location: /notes');
    die();
}
```
