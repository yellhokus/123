CREATE DATABASE survey_app;
USE survey_app;

CREATE TABLE surveys (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT
);

CREATE TABLE answers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    survey_id INT,
    answer_text VARCHAR(255),
    votes INT DEFAULT 0,
    FOREIGN KEY (survey_id) REFERENCES surveys(id)
);
