-- Creazione del database
CREATE DATABASE insalata;

-- Selezione del database
USE insalata;

CREATE TABLE item (
    id INT AUTO_INCREMENT,
    quantita INT,
    prezzo DECIMAL(10, 2),
    tipo ENUM('O','D'),
    PRIMARY KEY (id)
    );

    INSERT INTO item (quantita, prezzo, tipo)
VALUES
    (10, 12.50, 'O'),
    (20, 15.00, 'D'),
    (30, 17.50, 'O'),
    (40, 20.00, 'D'),
    (50, 22.50, 'O'),
    (60, 25.00, 'D'),
    (70, 27.50, 'O'),
    (80, 30.00, 'D'),
    (90, 32.50, 'O'),
    (100, 35.00, 'D');
