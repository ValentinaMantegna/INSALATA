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
    (1, 12.50, 'O'),
    (1, 15.00, 'D'),
    (1, 17.50, 'O'),
    (1, 20.00, 'D'),
    (1, 22.50, 'O'),
    (1, 25.00, 'D'),
    (1, 27.50, 'O'),
    (1, 30.00, 'D'),
    (1, 32.50, 'O'),
    (1, 35.00, 'D');
