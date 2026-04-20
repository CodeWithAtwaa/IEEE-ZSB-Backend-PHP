# Object Oriented Programming

## Visibiility Markers

- Properties and methods can have access modifiers (or visibility keywords) which control where they can be accessed.

| Modifier    | Access                                 |
| ----------- | -------------------------------------- |
| `public`    | Accessible from anywhere               |
| `protected` | Accessible inside class and subclasses |
| `private`   | Accessible only inside the same class  |

## Constructor Method

- Is a special (Magic) method within a class that is automatically called each time a new object is created from a class (with the new keyword).
- can be inherite.
- can take argument

```php
class Car {
   function __construct() {
        echo "HI";
    }
}

$car = new Car();
```

## Destructor Method

- Is a special (Magic) method within a class that is automatically called when an object is destroyed or when the script finishes execution.
- cann't take argument.

```php
class Car {
   function __construct() {
        echo "HI";
    }
   function __destruct() {
        echo "object is destroy!";
    }
}

$car = new Car();
```

## Call Method

- \_\_call Magic function.
- Called invoke method not found or not accessable.

```php
class Car {
   function __construct() {
        echo "HI";
    }
   function __call($method, $prams) {
    echo "The function not found" . $method ;
   }
}

$car = new Car();
echo $car->getName();
```

## Get & Set

`__get`

- Called when getting a property not accessible or not found
- accept one parameter (property)

`__set`

- Called when setting value to a property not accessible or not found
- accept two parameters (property, value)

```php
class Car
{
    function __get($prop)
    {
        echo "The property not found" . $prop;
    }

    function __set($prop, $value)
    {
        echo "The property not found" . $prop . " -> " . $value;
    }
}

$car = new Car();
echo PHP_EOL;
echo $car->age;
echo PHP_EOL;
$car->age = 25;
echo PHP_EOL;
```

## Clone

- Typical copy of object, without chenge data.

```php
class Car
{
    public $name;

    public function __construct($n)
    {
        $this->name = $n;
    }

    public function __clone()
    {
        $this->name = (string) $this->name;
    }
}

$car = new Car("Audi");
$copy = clone $car;
$car->name = "BMW";

echo $copy->name; // Audi
echo $car->name;  // BMW
```

## Static Method & Property

- static means the property or method belongs to the class itself, not to each object.

#### How to access it

1. outside class use `classname::staticname`.
2. inside class use `self::staticname`.
3. in ineritance use `parent::staticname`.

### Static property

```php
class Car
{
    public static $count = 0;

    public function __construct()
    {
        self::$count++;
    }
}

new Car();
new Car();

echo Car::$count; // 2
```

### Static method

```php
class MathHelper
{
    public static function add($a, $b)
    {
        return $a + $b;
    }
}

echo MathHelper::add(5, 3); // 8
```

### Static property/method:

```php
class Test
{
    public static $x = 10;

    public static function show()
    {
        return self::$x;
    }
}
```

## Trait

- Traits are used to declare methods that can be used in multiple classes.
- Traits can have methods and abstract methods that can be used in multiple classes, and the methods can have any access modifier (public, private, or protected).
- Traits allow you to reuse several methods freely in different classes, and are a mechanism for code reuse.

`Define a Trait`

```php
trait Engine {

}
```

`Use the Trait`

```php
class BMW {
    use Engine;
}
```

```php
trait message1 {
  public function msg1() {
    echo "PHP OOP is fun! ";
  }
}

trait message2 {
  public function msg2() {
    echo "Traits reduce code duplication!";
  }
}

class Welcome {
  use message1;
}

class Welcome2 {
  use message1, message2;
}

$obj = new Welcome();
$obj->msg1();
echo "<br>";

$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
```

### How to solve the conflict from tarit

1. trait name :: function name insteadof another triat name.
2. using `as` to make alias name from trait.

```php
    trait MyFeature1 {
        public function feature() {
            echo "This is from one";
        }
    }
    trait MyFeature2 {
        public function feature() {
            echo "two";
        }
    }
    class Car {
        use MyFeature1, MyFeature2 {
            MyFeature1::feature insteadof MyFeature2;
            MyFeature2::feature as F2;
        }
    }
    $car = new Car();
    echo $car->feature(); // from one
    echo $car->F2(); // from two
```

## Namespaces

- are used to prevent naming conflicts between classes, interfaces, functions, and constants.
- Namespaces are used to group related code together under a name - to avoid naming conflicts when your code grows, or when you use code from multiple sources.

#### Why Use Namespaces?

- To avoid name conflicts, especially in larger projects
- To organize code into logical groups
- To separate your code from code in libraries
- To allow the same name to be used for more than one class, without conflict

```php
namespace Club;
class BR {

}
class RM {

}
class BVB {

}
```

```php
namespace Html;
class Table {
  public $title = "";
  public $rows = 0;
  public function info() {
    echo "<p>$this->title has $this->rows rows.</p>";
  }
}

$table = new \Html\Table();
$table->title = "My table";
$table->rows = 5;

```
