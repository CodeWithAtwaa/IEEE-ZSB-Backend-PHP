-- Safe rewrite / migration script for `users` table
-- 1) Preferred non-destructive change: add AUTO_INCREMENT to `id` if possible.
-- 2) If the ALTER fails or you prefer a fresh table, use the DROP/CREATE block below (destructive).

-- Run: mysql -u root -p your_database_name < rewrite_tables.sql

-- Begin transaction
SET autocommit = 0;
START TRANSACTION;

-- Attempt to make `id` an AUTO_INCREMENT primary key (non-destructive)
-- If `id` already exists and is INT, this will set AUTO_INCREMENT.
ALTER TABLE users MODIFY id INT NOT NULL AUTO_INCREMENT PRIMARY KEY;

COMMIT;
SET autocommit = 1;

-- ===== Destructive alternative (uncomment to use) =====
-- WARNING: This will drop the existing `users` table and all data.
-- DROP TABLE IF EXISTS users;
-- CREATE TABLE users (
--   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   email VARCHAR(255) NOT NULL UNIQUE,
--   password VARCHAR(255) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- If you need to preserve data from an old schema that lacks `id`, you can:
-- 1) Create the new table as `users_new` with the correct schema
-- 2) Copy/transform data from `users` into `users_new` (mapping/generating ids)
-- 3) Drop/rename tables as needed

-- Example (preserve data by creating new table and copying):
-- CREATE TABLE users_new (
--   id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
--   email VARCHAR(255) NOT NULL UNIQUE,
--   password VARCHAR(255) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
-- INSERT INTO users_new (email, password)
--   SELECT email, password FROM users;
-- RENAME TABLE users TO users_old, users_new TO users;
-- DROP TABLE users_old;


SELECT * FROM users; -- Verify the new schema and data after migration