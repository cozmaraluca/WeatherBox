<!DOCTYPE html>
<html><body>
<?php

$nume_server = "localhost";

$nume_bd = "r64511gran_date_senzori";

$nume_utilizator = "r64511gran_raluca";

$parola = "z93VuZHqr2vbTwd";

// Create connection
$conn = new mysqli($nume_server, $nume_utilizator, $parola, $nume_bd);
// Check connection
if ($conn->connect_error) {
    die("Eroare conexiune: " . $conn->connect_error);
} 

$sql = "SELECT id, senzor, locatie, umiditate, temperatura, timp FROM date_senzor ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Senzor</td> 
        <td>Cod</td> 
        <td>Umiditate</td> 
        <td>Temperatura</td>
        <td>Timp</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_senzor = $row["senzor"];
        $row_cod = $row["cod"];
        $row_umiditate = $row["umiditate"];
        $row_temperatura = $row["temperatura"]; 
        $row_timp = $row["timp"];
        // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
      
        // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
        //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_senzor . '</td> 
                <td>' . $row_cod . '</td> 
                <td>' . $row_umiditate . '</td> 
                <td>' . $row_temperatura . '</td>
                <td>' . $row_timp . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>