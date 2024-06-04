<?php

// Configurazione della connessione
$host = 'localhost';
$username = 'root';
$password = 'sw2023';
$dbname = 'insalata';

// Creazione della connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

// Inserimento di un nuovo dato
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['prezzo']) && isset($_POST['tipo'])) {
    $prezzo = $_POST['prezzo'];
    $tipo = $_POST['tipo'];

    // Preparazione della query di inserimento
    $query = "INSERT INTO item (quantita, prezzo, tipo) VALUES (1, $prezzo, '$tipo')";

    // Esecuzione della query
    if ($conn->query($query) === TRUE) {
        echo "Nuovo dato inserito con successo!";
    } else {
        echo "Errore durante l'inserimento del dato: " . $conn->error;
    }
}

// Chiusura della connessione
$conn->close();