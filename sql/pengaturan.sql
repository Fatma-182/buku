CREATE TABLE IF NOT EXISTS pengaturan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_sistem VARCHAR(100) NOT NULL,
    zona_waktu VARCHAR(50) DEFAULT 'Asia/Makassar',
    mode VARCHAR(20) DEFAULT 'aktif',
    catatan TEXT,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO pengaturan (nama_sistem) VALUES ('Buku Tamu Satpam');