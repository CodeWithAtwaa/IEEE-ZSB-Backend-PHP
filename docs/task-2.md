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
