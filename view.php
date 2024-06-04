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
$query = "SELECT * FROM item";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<th>Quantità</th><th>Prezzo</th><th>Tipo</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['quantita'] . "</td>";
        echo "<td>" . $row['prezzo'] . "</td>";
        echo "<td>" . $row['tipo'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nessun risultato";
}

// Chiusura della connessione
$conn->close();


//inserire prezzo e un tasto invia method post


?>

<br>

<form action="insert.php" method="post">
    <label for="prezzo">Prezzo:</label>
    <input type="number" step="0.01" id="prezzo" name="prezzo" required>
    
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
        <option value="">Seleziona tipo</option>
        <option value="O">Offerta</option>
        <option value="D">Domanda</option>
    </select>
    
    <input type="submit" value="Invia">
</form>