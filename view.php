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
        echo "<td>" . $row['totale']  . "</td>";
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
        echo "<td>" . $row2['totale']  . "</td>";
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

<button onclick="showForm()">Aggiungi nuovo dato</button>
<div id="modal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeForm()">&times;</span>
    <form id="insertForm" action="insert.php" method="post">
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
  </div>
</div>

<script>
function showForm() {
    var modal = document.getElementById('modal');
    modal.style.display = 'block';
}

function closeForm() {
    var modal = document.getElementById('modal');
    modal.style.display = 'none';
}

document.getElementById('insertForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var formData = new FormData(this);
    
    fetch('insert.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Aggiorna la pagina dopo l'inserimento dei dati
        location.reload();
    })
    .catch(error => console.error('Errore:', error));
});
</script>


<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
table {
     float: left; margin-right: 10px; 
     }
</style>