# The Documentation

### Adding Index for users table

-i use unique index and cluster database to enhance performace.

- `Unique Index` : Ensure no duplicate values exist in specific column.
  - Slightly increase query performance

```sql
CREATE UNIQUE INDEX inx_users_email
    ON users (email);
```

### intro to Authorization and status code

- code `404` it means the page not found.

```php
if (! $note) {
    abort();
}
```

- code `403` it means the page Forbidden.

```php
if ($note['user_id'] !== 1) {
    abort(403);
}

```

### Validation on Form

- You must make Validation for every form to prevent any dumy data or attck.
- Make Validation.
- Make Validation.
- Make Validation.

```php
$body = $bosy_error= "";
if($_SERVER['REQUEST_METHOD'] === "POST") {
    $body = $_POST['body'];

    if(empty($body)) {
        $body_error = "PLZ, Enter thr body of note";
    }

    if(empty($body_error)) {
        $query = "INSERT INTO notes (body , user_id) VALUES (?,?)";
        $statment  = $db->query($query , [$body ,$currentUserId ]);

    }
}
```

- use `htmlspecialchars` to prvent injection html in form .

```php
 htmlspecialchars($note['body'])
```

- You must display error msg if the input validation is false.

```php
    if(empty($body)) {
        $body_error = "PLZ, Enter thr body of note";
    }
```
