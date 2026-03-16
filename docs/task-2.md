# The Documentation


### Adding Index for users table

-i use unique index and cluster database to enhance performace.

- `Unique Index` : Ensure no duplicate values exist in specific column.
  - Slightly increase query performance

```sql
CREATE UNIQUE INDEX inx_users_email
    ON users (email);
```
