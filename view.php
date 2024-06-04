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
$query = "SELECT * FROM marketplace";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Prodotto</th><th>Domanda Quantità</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['prodotto'] . "</td>";
        echo "<td>" . $row['domanda_quantita'] . "</td>";
        echo "<td>" . $row['domanda_quantita'] . "</td>";
        echo "<td>" . $row['domanda_quantita'] . "</td>";
        echo "<td>" . $row['domanda_quantita'] . "</td>";
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