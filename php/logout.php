<?php
    session_start();
    if (isset($_SESSION['unique_id'])) { // If user is logged in then come to this page otherwise go to login page
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if (isset($logout_id)) { // If logout ID set
            $status = "Offline now";
            // Once user logout we'll update this status to offline and in the login form
            // We'll again update the status to active now if user logged in success
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$logout_id}");
            if ($sql) {
                session_unset();
                session_destroy();
                header("location: ../pages/login.php");
            }
        } else {
            header("location: ../pages/users.php");   
        }
    } else {
        header("location: ../pages/login.php");
    }
?>