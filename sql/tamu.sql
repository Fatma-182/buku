CREATE TABLE tamu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    instansi VARCHAR(100),
    keperluan TEXT,
    waktu_masuk DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    waktu_keluar DATETIME,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
