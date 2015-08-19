CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY autoincrement ,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    gender INTEGER(1) NOT NULL,
    name_prefix VARCHAR(50) NOT NULL
);

INSERT INTO
    users (first_name, last_name, gender, name_prefix)
VALUES
    ('Max', 'Mustermann', '0', 'Prof. Dr.');
