USE order_db;

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    jumlah INT NOT NULL,
    alamat VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    pembayaran VARCHAR(50) NOT NULL,
    total DECIMAL(10, 2) NOT NULL
);