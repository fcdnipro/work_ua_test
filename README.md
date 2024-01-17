mysql -u root -p test
password: root

CREATE TABLE IF NOT EXISTS url_stats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    original_url VARCHAR(255) NOT NULL,
    short_url VARCHAR(10) NOT NULL,
    expiration_time DATETIME,
    clicks INT DEFAULT 0
);
