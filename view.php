<?php

// Configurazione della connessione
$host = 'localhost';
$username = 'root';
$password = 'Sw2023';
$dbname = 'insalata';

// Creazione della connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

// Esecuzione di una query
$query = "SELECT * FROM tabella";
$result = $conn->query($query);

// Elaborazione dei risultati
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['colonna1'] . " " . $row['colonna2'] . "\n";
    }
} else {
    echo "Nessun risultato";
}

// Chiusura della connessione
$conn->close();
?>


