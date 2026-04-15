# PHP Security

## Refactor with OOP

```php

    class Database  {
      private function connect () {
            if(! $con = mysqli_connect("localhost" , "root", "" , "secuirty_db")) {
                die("could not connect to the database");
            }

            return $con;
        }

        public function  db_query () {
            $con  = $this->connect();
            $result = mysqli_query($con, $query)

            if($result && mysqli_num_rows($reslut) > 0) {
                $data  = array();

                while($row = mysqli_fetch_assoc($result)) {
                    $data [] = $row;
                }
            }
            reutrn false;
        }
    }

    class Posts extends Database {
        // fetch all rows
        public function get_home_posts() {
            $query = "SELECT * FROM POSTS ";
            return db_query($query);
        }

        // To fetch one row
        public function get_one_post($id) {
            $query = "SELECT * FROM POSTS WHERE id = ${id}";
            return db_query($query);
        }
    }


    class Users extends Database {
        function
    }

```

## Login error messaging

- create new session

```php
    session_start();
```

- To remove all session

```php
    session_destroy();
```

- To remove specific sessino by name

```php
    session_unset($sesion_name);
```

## Least Privilege 

- admin access
- editor access
- user access
- everyone

## POST SQL Injection
- is a security vulnerability that happens when an attacker inserts malicious SQL code into a database query through user input


- `How to Prevent SQL Injection in PHP: `
1. Use Prepared Statements
```php
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
```

