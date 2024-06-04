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

// Esecuzione delle query
$query = "SELECT *, SUM(quantita) AS totale, prezzo FROM `item` WHERE tipo = 'O' GROUP BY prezzo;";
$result = $conn->query($query);
$query2 = "SELECT *, SUM(quantita) AS totale, prezzo FROM `item` WHERE tipo = 'D' GROUP BY prezzo;";
$result2 = $conn->query($query2);


if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<th>Quantità</th><th>Prezzo</th><th>Tipo</th></tr>";
    while ($row = $result->fetch_assoc()) {
       
        echo "<tr>";
        echo "<td>" . $row['quantita']  . "</td>";
        echo "<td>" . $row['prezzo'] . "</td>";
        echo "<td>" . $row['tipo']. "</td>";
        echo "</tr>";
        echo "<tr>";
}
    echo "</table>";
} else {
    echo "Nessun risultato";
}

if ($result2->num_rows > 0) {
    echo "<table border='1'>";
    echo "<th>Quantità</th><th>Prezzo</th><th>Tipo</th></tr>";
    while ($row2 = $result2->fetch_assoc()) {
       
        echo "<tr>";
        echo "<td>" . $row2['quantita']  . "</td>";
        echo "<td>" . $row2['prezzo'] . "</td>";
        echo "<td>" . $row2['tipo']. "</td>";
        echo "</tr>";
        echo "<tr>";
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