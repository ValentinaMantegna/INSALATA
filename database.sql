-- Creazione del database
CREATE DATABASE marketplace;

-- Selezione del database
USE insalata;

CREATE TABLE item (
    id INT AUTO_INCREMENT,
    quantita INT,
    prezzo DECIMAL(10, 2),
    tipo ENUM('O','D'),
    PRIMARY KEY (id)
    );

    INSERT INTO marketplace (prodotto, domanda_quantita, domanda_prezzo, offerta_quantita, offerta_prezzo)
VALUES
    ('Prodotto A', 100, 9.99, 80, 9.99),
    ('Prodotto B', 50, 19.99, 60, 19.99),
    ('Prodotto C', 120, 9.99, 90, 9.99),
    ('Prodotto D', 40, 19.99, 50, 19.99),
    ('Prodotto E', 90, 9.99, 100, 9.99),
    ('Prodotto F', 60, 19.99, 45, 19.99);

    Select *, sum(quantita) as totale,prezzo from 'items' where tipo = 'O' group by prezzo;
    Select *, sum(quantita) as totale,prezzo from 'items' where tipo = 'D' group by prezzo; 