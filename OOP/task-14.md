# Object Oriented Programming

## What is OOP ?

- OOP Stand for Object Oriented Programming.
- it center about Object.
- is about organizing code into classes and objects that have properties and methods.
- A Style of coding That allows Develpoers to Group similer tasks into classes.
- Use classes to organize the data and structure of aplication.
- Is a Programming pardigm based on `Object`.
- Everything is Object.
- Language Cannot be "OOP". only code can be.
- PHP Support OOP.

## Object-oriented programming has several advantages over procedural programming:

- OOP is faster and easier to execute
- OOP provides a clear structure for the program
- OOP helps to keep the code DRY "Don't Repeat Yourself", and makes the code easier to maintain, modify and debug
- OOP makes it possible to create full reusable applications with less code and shorter development time

## Why Should i use OOP ?

- More Security.
- More Dynamic.
- More Clean.

## What is Class and Object ?

- A class is a template for objects, and it defines the structure (properties) and behavior (methods) of an object.
- An object is an individual instance of a class.

## Rules to name convantion

- Class name is `PascalCase` : he first letter of every word is capitalized.
- Methods `camelCase` => first letter small and every first ltter from each word Caplitalized.
- Variable `camelCase` or `snakeCase`.
- Constants => `UPPER_SNAKE_CASE`.

- [ Class ] => to define class
- [ new ] => to make object
- [ -> ] => object operator
- [ $this ] => Pseudo this refer to object properties.
- [ public, private, protected ] => access modifiers.

### Define Class

```php
    // create class
    class AppleDevice {
        public $name = "Iphone7";
        public const $COMPANY = "Apple";
        public function getName() {

        }
    }

    // create object
    $iphone = new AppleDevice();
```

#### PHP - instanceof

- You can use the instanceof keyword to check if an object belongs to a specific class:

```php
    // create class
    class AppleDevice {
        public $name = "Iphone7";
        public const $COMPANY = "Apple";
        public function getName() {

        }
    }

    // create object
    $iphone = new AppleDevice();

    // check object belongs to a specific class
    var_dump($iphone instanceof AppleDevice );
```

### Class properties

- Property is `Variable` inside class.

```php

    // create class
    class AppleDevice {
        // properties
        public $name;
        public $ram;
        pubic $space;
    }

    // create object
    $iphone = new AppleDevice();
    $iphone->name = "Iphone7";
    $iphone->ram = "16GB";
    $iphone->space = "512GB";
```

### Class Method

- Method is `Functions`

```php

    // create class
    class AppleDevice {
        // properties
        public $name;

        //Methods
        public function getName() {
            return $this->name;
        }

        public function setName($n) {
            $this->naem = $n;
        }
    }

    // create object
    $iphone = new AppleDevice();

    $iphone->name = "Iphone7";
    echo $iphone->getName();

    $iphone->setName("Iphone17 pro");
    echo $iphone->getName();


```

### Pseudo THIS

- Refers to the current object (instance) of the class.
- Used to access `non-static` properties and methods.
- Only works inside object context (non-static methods).
- use ( $ )

```php

    // create class
    class AppleDevice {
        // properties
        public $name;

        //Methods
        public function getName() {
            return $this->name;
        }
    }
    // create object
    $iphone = new AppleDevice();

    $iphone->name = "Iphone7";
    echo $iphone->getName();
```

### Constants

- Class constants are useful if you need to define some constant data within a class.
- A class constant has a fixed value, and cannot be changed once it is declared.
- A class constant is declared inside a class with the `const` keyword.
- The default visibility of class constants is `public`.

```php

    // create class
class AppleDevice {
    // properties
    const CHIP = "A10 Fusion";
    //Methods
    public function getChip() {
        //  accessed from inside the class
        return self::CHIP;
    }
}
    // create object
$iphone = new AppleDevice();
echo $iphone->getChip();

echo "<br>";
//  accessed from outside the class
echo AppleDevice::CHIP;

```

## SELF

- Refers to the current class itself, not an object.
- Used with `static` properties and methods.
- Works inside `static` context.
- Not use ( $ )

## Key Differences

| Feature         | `$this`                       | `self`                    |
| --------------- | ----------------------------- | ------------------------- |
| Refers to       | Current object                | Current class             |
| Used with       | Non-static methods/properties | Static methods/properties |
| Requires object | Yes                           | No                        |
| Access syntax   | `$this->property`             | `self::$property`         |
