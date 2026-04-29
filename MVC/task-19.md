# MVC

##  In the MVC pattern, what is the only part of the application that should be allowed to talk directly to the database? Why?

- The Model is the only part of the application that should talk directly to the database.

`Why` 
1. Separation of concerns
 - Model: handle the data and bussines logic
 - View: display data.
 - Controller Handle request and  coordinates everything.

2. Easier maintenance
3. Centralized data logic

```php
// controller
$user =User::find($id);

// model
public function find($id) {
    $query = "SELECT * 
                FROM users
                WHERE $id=?"; 
}
```

## Why should sensitive information (like database passwords) be stored in a separate configuration file instead of being hardcoded in your main application files?
1. Better security
2. Easier environment management
3. Easier maintenance and updates
4. Cleaner code



## What is PDO in PHP, and why is it preferred over older methods like mysqli?
- PDO (PHP Data Objects) is a database access layer in PHP that provides a consistent, object-oriented way to interact with different databases (MySQL, PostgreSQL, SQLite).

`Why PDO is preferred over mysqli`
1. Database flexibility
2. Prepared statements (protect against SQL injection)
```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute(['id' => $id]);
```
3. Better error handling
```php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```


## How do "Prepared Statements" protect your website from SQL Injection attacks?
- Prepared statements protect your site by separating SQL code from user input, so the database never confuses data with executable commands.

```php
// one method
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);

// second method
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$email]);
```


## When you query a database, you can fetch a single row or multiple rows. Give a real-world example of a situation where you need just one row, and a situation where you need an array of multiple rows.

####  `one row`
- User Profile Page
```php
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute(['id' => $id]);
```

#### multiple rows
- Blog Homepage
```php
$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute(['id' => $id]);
```
