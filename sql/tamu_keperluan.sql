CREATE TABLE tamu_keperluan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tamu_id INT NOT NULL,
    keperluan_id INT NOT NULL,
    FOREIGN KEY (tamu_id) REFERENCES tamu(id) ON DELETE CASCADE,
    FOREIGN KEY (keperluan_id) REFERENCES tujuan_kunjungan(id) ON DELETE CASCADE
);
