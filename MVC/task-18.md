# MVC

## Controller Job

- The controller dosn't just return a page immediatly it goes through sequance of steps:

1. Receives the request from routes
2. Validate input
3. interacts with the model
4. Handles bussins logic
5. Prepares data for the View
6. Selects the View
7. Returns the response

`The Controller acts as the middleman`

## Dynamic Views

- `Static View`

1. A static is fixed
2. what you write is exactly what the user sees
3. every user show the same content
4. `index.html`

```php
<h1>Mohamed Atwaa</h1>
```

- `Dynamic View`

1. Generated at runtime
2. It can include variable, loops, conditioins
3. It receives data and renders different content depending on that data.

```php
<h1>Welcome, <?php echo $userName; ?></h1>
```

## Data Passing

- The Controller passes data to the View by attaching it to the response when rendering the View, usually as variables.

1. Fetch data in the Controller

```php
$user = User::get();
```

2. Pass data to the View

```php
    return view('index.php', ["user" => $user])
```

3. Use the data inside the View

```php
    for($users as $user) {
        <h1> <?= $user['id'] ?></h1>
    }
```

## Templating

- MVC helps you avoid repeating the same header/footer code by using shared templates (layouts/partials) that are reused across multiple Views.

1. Create separate reusable files `footer.php`
2. Include them in your Views

```php
    include('footer.php')
```

`MVC makes this easy`

- Separation of concerns
- Reusability
- Maintainability

## Logic in Views

- Putting complex logic in Views breaks one of the core ideas of MVC: separation of concerns.

Why it’s a bad practice

1. Views are meant for presentation only
2. Harder to read and maintain
3. Code duplication
4. Difficult to test and debug
5. Reduces flexibility

```php
<?php if ($isPremium): ?>
    <p>Premium User</p>
<?php endif; ?>
```