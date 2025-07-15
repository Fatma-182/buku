CREATE TABLE log_akses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    waktu DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    aksi ENUM('login', 'logout') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
