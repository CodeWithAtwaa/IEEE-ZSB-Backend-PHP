# IEEE-ZSB-Backend-PHP

A lightweight PHP backend project used for learning backend architecture, routing, controllers, basic authentication, and database interaction.

This repository demonstrates a small, structured PHP application with a custom routing system and simple MVC-style organization.

## Project structure

- `Core/` — core system classes (Router, Database, helpers)
- `Http/` — controllers and HTTP logic
- `database/` — migrations, seeds, or SQL files
- `public/` — public web root (entry point)
- `scripts/` — helper CLI scripts (debug, migrations)
- `views/` — view templates
- `tests/` — unit and integration tests
- `bootstrap.php`, `config.php`, `routes.php` — app boot and route definitions

--------

## Features

- Clean, minimal backend architecture
- Custom routing and controllers
- Session-based authentication helpers
- Simple database access wrapper around PDO
- PHPUnit / Pest test support

## Requirements

- PHP 8.0+
- Composer
- MySQL (or other supported DB) for the application

## Quickstart

1. Clone the repository

	git clone https://github.com/CodeWithAtwaa/IEEE-ZSB-Backend-PHP.git
	cd IEEE-ZSB-Backend-PHP

2. Install PHP dependencies

	composer install

3. Configure the database

	- Edit `config.php` and set your DB connection (host, port, dbname, charset).
	- If you use an environment file, copy `.env.example` to `.env` and update values.

4. (Optional) Run migrations / seed SQL

	php scripts/migrate.php

	Or run any provided SQL in `database/` (for example, `rewrite_tables.sql`).

5. Start the development server

	php -S localhost:8000 -t public

6. Visit

	http://localhost:8000

## Example: login → create note → list notes (curl)

1. Login (stores session cookie)

	curl -i -c cookies.txt -d "email=you@example.com&password=yourpass" http://localhost:8000/session

2. Create a note (use saved cookie)

	curl -i -b cookies.txt -d "body=My+test+note" http://localhost:8000/notes

3. List notes

	curl -i -b cookies.txt http://localhost:8000/notes

## Running tests

Run tests (PHPUnit or Pest):

	vendor/bin/phpunit
	# or if Pest installed
	vendor/bin/pest

## Contributing

Contributions are welcome. Suggested workflow:

1. Fork the repository
2. Create a feature branch
3. Make changes and add tests
4. Open a pull request

Follow clean coding practices and add tests when appropriate.

## License

This project is licensed under the MIT License. Add a `LICENSE` file at the repository root if you want to include the full license text.

---
If you want, I can also:

- add badges (CI, PHP version)
- create a `LICENSE` file with the MIT text
- add a short troubleshooting section (common errors and fixes)
