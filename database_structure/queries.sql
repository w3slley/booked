CREATE TABLE add_book (
id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT NOT NULL,
book_title VARCHAR(256) NOT NULL,
author_name VARCHAR(256) NOT NULL,
catg_id INT NOT NULL,
month_id INT NOT NULL,
year_id INT NOT NULL,
classification INT,
task_date VARCHAR(256) NOT NULL
);