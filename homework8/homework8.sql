CREATE DATABASE IF NOT EXISTS class_notes;
USE class_notes;

CREATE TABLE notes (
    id INT(11) NOT NULL AUTO_INCREMENT,
    title VARCHAR(80) NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id)
);


INSERT INTO notes (title, description) VALUES
('Meeting Notes', 'Discussed project deadlines and deliverables.'),
('Shopping List', 'Buy milk, eggs, bread, and fruits.'),
('Workout Plan', 'Cardio on Monday, Strength on Wednesday, Yoga on Friday.'),
('Book Ideas', 'Thinking about writing a sci-fi novel.'),
('Travel Plans', 'Planning a trip to Japan next summer.');

UPDATE notes 
SET description = 'Cardio on Monday, Strength on Wednesday, Yoga on Sunday.' 
WHERE title = 'Workout Plan';

SELECT * FROM notes 
ORDER BY title DESC;

SELECT * FROM notes 
ORDER BY id 
LIMIT 1 OFFSET 1;

SELECT * FROM notes 
WHERE description REGEXP '[aeiouAEIOU]';
