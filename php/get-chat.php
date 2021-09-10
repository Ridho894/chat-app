<?php
    session_start();
    if (isset($_SESSION['unique_id'])) {
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            while($row = mysqli_fetch_assoc($query)) {
                if ($row['outgoing_msg_id'] === $outgoing_id) { // If this equal to then he is a msg sender
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                } else { // He is a msg receiver
                    $output .= '<div class="chat incoming">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    } else {
        header("../pages/login.php");
    }
?>