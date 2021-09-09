<?php 
    session_start();
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
?>

<?php include_once '../header.php' ?>
<body>
    <div class="wrapper">
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
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row["lname"]; ?></span>
                        <p><?php echo $row['status']; ?></p>
                    </div>
                </div>
                <a href="index.php" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a><a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a><a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a><a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
                <a href="#">
                    <div class="content">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="a">
                        <div class="details">
                            <span>Yusuf</span>
                            <p>This is test message</p>
                        </div>
                    </div>
                    <div class="status-dot">
                        <i class="fas fa-circle"></i>
                    </div>
                </a>
            </div>
        </section>
    </div>
    <script src="../javascript/users.js"></script>
</body>

</html>