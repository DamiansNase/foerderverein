<?php
$ablaufdatum = time() - 3600; // Eine Stunde in der Vergangenheit

// Lösche den Cookie mit dem Namen "loggedin"
setcookie("loggedin", "", $ablaufdatum);

header("Location: admin-login.html");
?>