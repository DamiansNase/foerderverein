<html>
    <body>
        <a href="logout.php">Log Out</a>
    <?php
    // Überprüfe, ob der Cookie gesetzt wurde
    if (isset($_COOKIE['loggedin'])) {
        
    } else {
        header('Location: admin-login.html');
    }
    include "database.php";

    // SQL-Abfrage ausführen
    $sql = "SELECT * FROM data";
    $result = $conn->query($sql);

    if ($result = mysqli_query($conn, $sql)) {

        // Return the number of rows in result set
        $rowcount = mysqli_num_rows( $result );
        
        // Display result
        echo "<h1>Einträge insgesamt: " . $rowcount .  "</h1>";
    }



    // Tabelle erstellen und Daten ausgeben
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Vorname</th><th>Nachname</th><th>Email</th><th>Betrag</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["vorname"] . "</td>";
            echo "<td>" . $row["nachname"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["betrag"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Keine Daten gefunden.";
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
    ?>
</body>
</html>