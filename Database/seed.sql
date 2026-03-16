use IEEE_Backend_PHP;

-- =========================
-- insert data in user table
INSERT INTO
    users (name, email)
VALUES (
        "Mohamed",
        "mohmedtamer9887@gmail.com"
    );

INSERT INTO
    users (name, email)
VALUES ("ahmed", "ahmed78@gmail.com");

INSERT INTO
    users (name, email)
VALUES ("Ali", "aliasd98@gmail.com");

INSERT INTO
    users (name, email)
VALUES (
        "shrouk",
        "shrouk123@gmail.com"
    );

INSERT INTO
    users (name, email)
VALUES ("warda", "warda000@gmail.com");

INSERT INTO
    users (name, email)
VALUES ("manar", "manar4@gmail.com");

-- =========================
-- Insert Data in posts table
INSERT INTO posts (title, user_id) VALUES ("my first post", 1);

INSERT INTO posts (title, user_id) VALUES ("my second post", 1);

INSERT INTO posts (title, user_id) VALUES ("my third post", 2);

INSERT INTO posts (title, user_id) VALUES ("my fourth post", 3);

-- =========================
-- insert data in notes table
INSERT INTO notes (body, user_id) VALUES ("Hi Ya man ", 1);
INSERT INTO notes (body, user_id) VALUES ("my fits note ", 1);
INSERT INTO notes (body, user_id) VALUES ("Hi Ya man ", 2);
INSERT INTO notes (body, user_id) VALUES ("Hi wellcome ", 3);
INSERT INTO notes (body, user_id) VALUES ("Hi Ya man ", 2);
INSERT INTO notes (body, user_id) VALUES ("Hi Ya man ", 4);
INSERT INTO notes (body, user_id) VALUES ("Hi jon doe ", 5);
INSERT INTO notes (body, user_id) VALUES ("I'am SWE ", 6);