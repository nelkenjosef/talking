CREATE TABLE posts (
    id INTEGER NOT NULL PRIMARY KEY autoincrement ,
    user_id INTEGER NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO
    posts (user_id, title, content)
VALUES
    (1, 'First Title', 'First Content'),
    (2, 'Second Title', 'Second Content'),
    (1, 'Third Title', 'Third Content');
