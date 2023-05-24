<?php
include "database.php";

// Daten aus der MySQL-Datenbank abrufen
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

// Excel-Datei generieren
$filename = "datenbank_export.xlsx";

// Dateiheader setzen
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Cache-Control: max-age=0");
header("Expires: 0");
header("Pragma: public");

// Excel-Tabelle erstellen
$delimiter = "\t";
$linebreak = "\r\n";

// Spaltenüberschriften
$columnNames = array("id", "vorname", "nachname", "email", "betrag");
echo implode($delimiter, $columnNames) . $linebreak;

// Daten aus der Datenbank abrufen und in die Excel-Datei schreiben
while ($row = $result->fetch_assoc()) {
    $rowData = array($row["id"], $row["vorname"], $row["nachname"], $row["email"], $row["betrag"]);
    echo implode($delimiter, $rowData) . $linebreak;
}

// Verbindung schließen
$conn->close();
