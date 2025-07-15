CREATE TABLE tamu_ke_lokasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tamu_id INT NOT NULL,
    lokasi_id INT NOT NULL,
    FOREIGN KEY (tamu_id) REFERENCES tamu(id) ON DELETE CASCADE,
    FOREIGN KEY (lokasi_id) REFERENCES lokasi(id) ON DELETE CASCADE
);
