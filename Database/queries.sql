use IEEE_Backend_PHP;

SELECT * FROM posts;

SELECT * FROM users;

SELECT * FROM notes;
SELECT 
    un.id AS user_id,
    un.name AS user_name,
    p.id AS post_id,
    un.note_id
FROM (
        SELECT 
            u.id,
            u.name,
            n.id AS note_id,
            n.user_id
        FROM users u
        JOIN notes n ON u.id = n.user_id
     ) AS un
JOIN posts p
ON un.id = p.user_id;

SELECT 
    u.id AS user_id,
    u.name AS user_name,
    p.id AS post_id,
    n.id AS note_id
FROM users u
JOIN notes n ON u.id = n.user_id
JOIN posts p ON u.id = p.user_id;

SELECT *
FROM users u
    JOIN notes n ON u.id = n.user_id
    JOIN posts p ON u.id = p.user_id;