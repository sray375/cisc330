CREATE DATABASE in_class_17; 

CREATE TABLE `users` (
    `user_id` INT(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(80) NOT NULL,
    `address_id` INT(11) NOT NULL,
    PRIMARY KEY (`user_id`)
);

CREATE TABLE `user_comments` (
    `comment_id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `comment_text` TEXT NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE
);

INSERT INTO `users` (`name`, `address_id`) VALUES
('Alice', 10),
('Bob', 20),
('Charlie', 30),
('David', 40);

INSERT INTO `user_comments` (`user_id`, `comment_text`) VALUES
(1, 'Alice’s first comment.'),
(1, 'Alice’s second comment.'),
(2, 'Bob’s first comment.'),
(3, 'Charlie’s first comment.');

-- Query to return all users and their comments (even if they have none)
SELECT users.user_id, users.name, user_comments.comment_text
FROM users
LEFT JOIN user_comments ON users.user_id = user_comments.user_id;

-- Query to return only users who have comments
SELECT users.user_id, users.name, user_comments.comment_text
FROM users
INNER JOIN user_comments ON users.user_id = user_comments.user_id;
