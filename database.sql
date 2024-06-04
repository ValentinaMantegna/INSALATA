-- Creazione del database
CREATE DATABASE insalata;

-- Selezione del database
USE insalata;

CREATE TABLE marketplace (
    id INT AUTO_INCREMENT,
    prodotto VARCHAR(50),
    domanda_quantita INT,
    domanda_prezzo DECIMAL(10, 2),
    offerta_quantita INT,
    offerta_prezzo DECIMAL(10, 2),
    PRIMARY KEY (id)
    );