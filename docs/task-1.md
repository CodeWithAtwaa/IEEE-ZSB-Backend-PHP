# The Documentation

### PHP Syntax

- A php script start with `<?php` and end with `?>` .
- All php statement must end by `;`.
- PHP case sensitive for user defined Variable.

```php

<?php
    echo "Wellcom";

    $name = "Mohamed";
    $Name = "Ahmed";
?>
```

### To diplay output

```php
    echo ("Hi");
    print("Hi");
```

### Comments

- A comments are not executed as a part of the code.
- to make comment in php use `//` or `/**/`.

```php
    // variable for age
    $age = 20;

    /*
    * I hate Python
    * I prefer PHP
    */
    print("I hate python, I love PHP, Ya Fallah");
```

### Variables

- A Variable is a container to store data.
- A variables are case-sensitive for user-defined.
- A variable must has a dscriptive name and short name.

`Rules For Variable in php`

- A variable must start with the `$` dollar sign, followed by the name of the variable
- A variable name must start with a letter or the underscore character
- A variable name cannot start with a number
- A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and \_ )
- Variable names are case-sensitive.

```php
<?php
    $name = "Mohamed";
    $gae = 20;
    $GPA = 3.771;
    $_faculty = "FCI-ZU";
?>
```

### Conditions and Boolean

- Conditional statements are used to perform different actions based on different conditions.
- [if else , switch]

```php
<?php
    $name = "Mohamed";
    $found = true;
    if ($name != "Mohamed") {
        echo "you are a Thief";
    }else if($name == "Mohamed" && $found) {
        echo "Wellcom ya man";
    }else {
        print ("انطر ابلكاش");
    }

    $_faculty = "College of Engineering";
    switch ($_faculty) {
        case 'College of Engineering' :
            echo "You are a Human Ya Man...!"
            break;
        case 'College of Computer sceince and Informatics' :
            echo "You are a SWE";
            break;
        default :
            echo "انت انسان فقط":
    }
?>
```

### Array

- an array is a special variable that can hold many values under a single name, and you can access the values by referring to an index number or a name.

`Array Types`

- Indexed array

* Associative array

```php
    $arr = [1,2,"Mohamed" , true, null];
    $arr2 = array(10,20,30,40,50,null , true);

    $asoc = [
        'name' => "Mohamed" ,
        'age' => 20,
        'faculty' => 'FCI-ZU'
    ];

```

### Functions And Filters

- A function is a block of statements that can be used repeatedly in a program.
- A function is executed only when it is called.

```php
    // Defined Functino
    function funName() {
        // logic
    }

    // to call the function
    funName();



    function FilterByAuthor($books , $author) {
        $filterBooks = [];
        foreach($books as $book) {
            if($book['author'] === $author) {
                $filterBooks[] = $book;
            }
        }
        return $filterBooks;
    }

        <?php foreach (FilterByAuthor($books , "Mohamed") as $book): ?>
            <?php if ($book['author'] == "Mohamed"): ?>
                <li>
                    <a href="<?= $book['purchaseUrl'] ?>">
                        <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

```

### Lamda Functions

- Inline function
- function store as a variable.

```php
    $filteredItems = filter($books, function ($book) {
        return $book['releaseYear'] <= 2000;
    });

```
### To import files in php
- `include` 
- `require` 
```php
include("file.php");
require("file.php");
```