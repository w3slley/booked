CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    first_name TEXT NOT NULL,
    last_name TEXT NOT NULL,
    user_name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    birth_date INTEGER 

);

CREATE TABLE books (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    book_title TEXT
);

CREATE TABLE authors (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    author_name TEXT
);

CREATE TABLE categories (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    catg_name TEXT
);

CREATE TABLE month_finished (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    month_name TEXT
);

CREATE TABLE year_finished (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    year_number INT(4)
);

CREATE TABLE add_book (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER,
    book_id INTEGER,
    author_id INTEGER,
    catg_id INTEGER,
    month_id INTEGER,
    year_id INTEGER,
    task_date VARCHAR(256)
);


INSERT INTO year_finished (year_number) VALUES (2014);
INSERT INTO year_finished (year_number) VALUES (2015);
INSERT INTO year_finished (year_number) VALUES (2016);
INSERT INTO year_finished (year_number) VALUES (2017);
INSERT INTO year_finished (year_number) VALUES (2018);

INSERT INTO month_finished (month_name) VALUES ('January');
INSERT INTO month_finished (month_name) VALUES ('Febrary');
INSERT INTO month_finished (month_name) VALUES ('March');
INSERT INTO month_finished (month_name) VALUES ('April');
INSERT INTO month_finished (month_name) VALUES ('May');
INSERT INTO month_finished (month_name) VALUES ('June');
INSERT INTO month_finished (month_name) VALUES ('July');
INSERT INTO month_finished (month_name) VALUES ('August');
INSERT INTO month_finished (month_name) VALUES ('September');
INSERT INTO month_finished (month_name) VALUES ('October');
INSERT INTO month_finished (month_name) VALUES ('November');
INSERT INTO month_finished (month_name) VALUES ('December');






/* This is the sql query to display the books added! */
SELECT add_book.id, first_name, book_title, author_name, catg_name, month_name, year_number, task_date FROM add_book
JOIN users ON user_id = users.id
JOIN books ON book_id = books.id
JOIN authors ON author_id = authors.id
JOIN categories ON catg_id = categories.id
JOIN month_finished ON month_id = month_finished.id
JOIN year_finished ON year_id = year_finished.id WHERE user_id = ID OF THE USER LOGGED IN;

/*This is the sql query to count the number of books read in a particular MONTH in a particular year!*/
SELECT COUNT(book_title), month_name, year_number FROM add_book 
JOIN users ON user_id = users.id 
JOIN books ON book_id = books.id 
JOIN authors ON author_id = authors.id 
JOIN categories ON catg_id = categories.id 
JOIN month_finished ON month_id = month_finished.id 
JOIN year_finished ON year_id = year_finished.id 
WHERE user_id = '1' AND year_number = '2018' GROUP BY month_name;


/*This is the sql query to count the number of books read in a year*/
SELECT COUNT(book_title), month_name, year_number FROM add_book 
JOIN users ON user_id = users.id 
JOIN books ON book_id = books.id 
JOIN authors ON author_id = authors.id 
JOIN categories ON catg_id = categories.id 
JOIN month_finished ON month_id = month_finished.id 
JOIN year_finished ON year_id = year_finished.id 
WHERE user_id = '1' AND year_number = '2018' GROUP BY year_number;

/*This is the sql query to search books per title or author*/

SELECT book_title, author_name, catg_name, month_name, year_number, task_date FROM add_book 
JOIN users ON user_id = users.id 
JOIN books ON book_id = books.id 
JOIN authors ON author_id = authors.id 
JOIN categories ON catg_id = categories.id 
JOIN month_finished ON month_id = month_finished.id 
JOIN year_finished ON year_id = year_finished.id 
WHERE user_id = '1' AND book_title = 'something' OR author_name = 'some name' 
OR catg_name = 'same name' ORDER BY month_id DESC;


/*This is the query that gets and displays only the years the user added books to the database! The 
DISTINCT parameter helped a lot here!*/
SELECT DISTINCT year_number FROM add_book  
JOIN users ON user_id = users.id
JOIN books ON book_id = books.id
JOIN authors ON author_id = authors.id
JOIN categories ON catg_id = categories.id
JOIN month_finished ON month_id = month_finished.id
JOIN year_finished ON year_id = year_finished.id WHERE user_id = 1 ORDER BY year_number;


/*This query selects all of these where the add_book id is such...*/
SELECT add_book.id, book_title, book_id, author_name, catg_name, month_name, year_number, task_date 
FROM add_book JOIN users ON user_id = users.id 
JOIN books ON book_id = books.id 
JOIN authors ON author_id = authors.id 
JOIN categories ON catg_id = categories.id 
JOIN month_finished ON month_id = month_finished.id 
JOIN year_finished ON year_id = year_finished.id 
WHERE user_id =1 AND add_book.id = 21;

/*This query updates any valeu inside the tables joined where the add_book id is equal to something...*/
UPDATE add_book
JOIN users ON user_id = users.id
JOIN books ON book_id = books.id
JOIN authors ON author_id = authors.id
JOIN categories ON catg_id = categories.id
JOIN month_finished ON month_id = month_finished.id
JOIN year_finished ON year_id = year_finished.id
SET author_name = 'Black Crouch' WHERE add_book = 21;