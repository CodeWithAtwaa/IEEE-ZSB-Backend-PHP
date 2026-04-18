# Object Oriented Programming

## Access Modifiers

- Properties and methods can have access modifiers (or visibility keywords) which control where they can be accessed.

| Modifier    | Access                                 |
| ----------- | -------------------------------------- |
| `public`    | Accessible from anywhere               |
| `protected` | Accessible inside class and subclasses |
| `private`   | Accessible only inside the same class  |

## Encapsulation

- Encapsulation is an OOP concept where data (properties) and methods are bundled inside a class, and direct access to the data is restricted. Instead, the data is accessed through public methods.
- Protects data from unauthorized access
- Prevents accidental modification
- Makes code more secure and maintainable

```php
// create class
class AppleDevice
{
    // properties
    public $name;
    private $ram;

    //Methods
    public function getName() {
        return $this->name;
    }
}
// create object
$iphone = new AppleDevice();
echo $iphone->name = "Iphone 14";
echo "<br>";
echo $iphone->getName();
```

## What is Inheritance ?

- Inheritance in PHP OOP allows a child class to inherit all the public and protected properties and methods from a parent class.
- In addition, the child class can have its own properties and methods
  `Note`: Private methods of a parent class are not accessible to a child class.
- An inherited class is defined with the `extends` keyword.

```php
class AppleDevice
{
    // properties
    public $name;
    private $ram;
    protected $space;

    //Methods
    public function getName() {
        return $this->name;
    }
}

class Sony extends AppleDevice {
    public $camera;
    public function getCamera() {
        return $this->camera;
    }
}

$sony = new Sony();
echo $sony->name = "Sony";
echo $sony->getCamera();
```

## What is Overriding Inherited Methods?

- Inherited methods can be overridden by redefining the methods (use the same name) in the child class.

```php
class Fruit {
  public $name;
  public $color;

  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }

  public function intro() {
    echo "The fruit is $this->name and the color is $this->color.";
  }
}

class Strawberry extends Fruit {
  public $weight;

  public function __construct($name, $color, $weight) {
    $this->name = $name;
    $this->color = $color;
    $this->weight = $weight;
  }

  public function intro() {
    echo "A $this->name is $this->color, and the weight is $this->weight gram.";
  }
}

$strawberry = new Strawberry("Strawberry", "red", 50);
$strawberry->intro();

```

## What is The final Keyword ?

- The `final` keyword can be used to prevent class inheritance or to prevent method overriding.

```php
class Fruit {
  final public function intro() {
    // some code
  }
}

class Strawberry extends Fruit {
  // will result in error
  public function intro() {
    // some code
  }
}
```

## What is Abstract Classes and Methods ?

- An abstract class is a class that contains at least one abstract method.
- An abstract method is a method that is declared, but not implemented in the abstract class.
- The implementation must be done in the child class(es).
- The purpose of an abstract class is to enforce all derived classes (child classes) to implement the abstract method(s) declared in the parent class.
- An abstract class or method is defined with the `abstract` keyword.
- cannot be instantiated.
- can have mehtods and properties.

```php
// Abstract base class
abstract class Car {
  public $name;

  // Non-abstract method
  public function __construct($name) {
    $this->name = $name;
  }

  // Abstract method - forces child classes to implement it
  abstract public function intro();
}

// Child class that extends the abstract class
class Audi extends Car {
  public function intro() {
    return "German quality! I'm an $this->name!";
  }
}

// Child class that extends the abstract class
class Citroen extends Car {
  public function intro() {
    return "French extravagance! I'm a $this->name!";
  }
}

// Create objects of the child classes
$audi = new audi("Audi");
echo $audi->intro();
echo "<br>";

$citroen = new citroen("Citroen");
echo $citroen->intro();
```

## What is Polymorphism ?

- Polymorphism is an OOP concept where a single method can perform different actions depending on the object that calls it.
- One method name → different behavior depending on the object.

## Interfaces

- An Interface lets you define which public methods a class MUST implement, without defining how they should be implemented.
- Interfaces are declared with the interface keyword, and the methods declared in an interface must be public.
- To implement an interface, a class must use the implements keyword.

```php
// Define the interface
interface Animal {
  public function makeSound();
}

// Implement the interface in a class
class Cat implements Animal {
  public function makeSound() {
    echo "Meow";
  }
}

// Implement the interface in another class
class Dog implements Animal {
  public function makeSound() {
    echo "Woff";
  }
}

$cat = new Cat();
$cat->makeSound();

$dog = new Dog();
$dog->makeSound();
```

## Interfaces vs. Abstract Classes

- Interfaces cannot have properties, while abstract classes can
- All interface methods must be public, while abstract methods can be public or protected
- All methods in an interface are abstract, so they cannot be implemented in code and the abstract keyword is not necessary
- Classes can implement an interface while inheriting from another class at the same time
