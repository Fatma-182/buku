CREATE TABLE tamu_perusahaan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tamu_id INT NOT NULL,
    perusahaan_id INT NOT NULL,
    FOREIGN KEY (tamu_id) REFERENCES tamu(id) ON DELETE CASCADE,
    FOREIGN KEY (perusahaan_id) REFERENCES perusahaan(id) ON DELETE CASCADE
);
