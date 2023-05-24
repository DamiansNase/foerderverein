<?php
include "database.php";

$vorname = $_POST['vorname'];
$nachname = $_POST['nachname'];
$email = $_POST['email'];
$betrag = $_POST['betrag'];

$sql = "INSERT INTO data (vorname, nachname, email, betrag)
VALUES ('$vorname', '$nachname', '$email', '$betrag')";

if ($conn->query($sql) === TRUE) {
  header('Location: index.html');
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>