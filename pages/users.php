<?php 
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>

<?php include_once '../header.php' ?>
<body>
    <div class="wrapper desktop">
        <section class="users">
            <header>
            <?php
                include_once "../php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="../php/images/<?php echo $row['img'] ?>"
                        alt=".img">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row["lname"]; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="../php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                
            </div>
        </section>
    </div>
    <div class="w-3/4 flex flex-col justify-between h-screen">
        <div class="">
            <h1>nama</h1>
        </div>
        <div class="">
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </div>
    </div>
    <script src="../javascript/users.js"></script>
</body>

</html>