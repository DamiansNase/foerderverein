<?php
include "database.php";

$Nutzername = "admin";
$password = "changeyourpassword123";
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin (nutzername, passwort)
VALUES ('$Nutzername', '$hash')";

if ($conn->query($sql) === TRUE) {
 echo "jaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>