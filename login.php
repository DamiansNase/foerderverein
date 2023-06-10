<?php
// Verbindungsinformationen zur MySQL-Datenbank
$host = "localhost"; // Adresse des MySQL-Servers
$user = "dbergemann_admin"; // Benutzername für den Zugriff auf die Datenbank
$password = "amesadssadsD8."; // Passwort für den Zugriff auf die Datenbank
$database = "dbergemann_foerderverein";
// Verbindung zur MySQL-Datenbank herstellen
$conn = mysqli_connect($host, $user, $password, $database);

// Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
if (!$conn) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . mysqli_connect_error());
}


// Nutzereingaben aus dem Formular abrufen
$nutzername = $_POST["nutzername"];
$passwort = $_POST["password"];

// SQL-Abfrage zum Abrufen des gehashten Passworts aus der Datenbank
$sql = "SELECT passwort FROM admin WHERE nutzername = '$nutzername'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $storedHash = $row['passwort'];

    // Überprüfen, ob das eingegebene Passwort mit dem gehashten Passwort übereinstimmt
    if (password_verify($passwort, $storedHash)) {
        // Anmeldung erfolgreich
        echo "Anmeldung erfolgreich! Willkommen, $nutzername!";
        // Setze das Ablaufdatum auf einen Tag in der Zukunft
        $ablaufdatum = time() + (24 * 60 * 60); // aktuelle Zeit + 24 Stunden (1 Tag)

        // Erstelle den Cookie mit dem Namen "loggedin" und dem Wert "yes"
        setcookie("loggedin", "yes", $ablaufdatum);
        header('Location: admin.php');
    } else {
        // Anmeldung fehlgeschlagen
        echo "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Ihre Nutzerdaten.";
    }
} else {
    // Anmeldung fehlgeschlagen
    echo "Anmeldung fehlgeschlagen. Bitte überprüfen Sie Ihre Nutzerdaten.";
}

// Datenbankverbindung schließen
mysqli_close($conn);
?>
