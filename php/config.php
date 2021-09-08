<?php
    $conn = mysqli_connect("localhost", "ridho", "!QAZ2wsx#EDC", "chat");
    if (!$conn) {
        echo "Database Connected" . mysqli_connect_error();
    }
?>