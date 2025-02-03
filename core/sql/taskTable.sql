CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    task_time TIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    day VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

