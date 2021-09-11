<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
        // Check user email valid or not
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // If email is valid
        // Check the email already exist in the database or not
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
            if (mysqli_num_rows($sql) > 0) { //If email already exist
                echo "$email - This email already exist!!";
            } else {
            // Check user upload file or not
                if (isset($_FILES['image'])) { // If file is uploaded
                    $img_name = $_FILES['image']['name']; // Getting user uploaded img name
                    $tmp_name = $_FILES['image']['tmp_name']; // temporary name is used to save/move file in our folder

                    // Explode image and get the last extension like jpg png
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); // Get the extension of an user uploaded img file

                    $extensions = ['png', 'jpeg', 'jpg']; // These are some valid img ext and we've store them in array
                    if (in_array($img_ext, $extensions) === true) { // if user uploaded img ext is matched with any array extensions
                        $time = time(); // This will return us current time

                        // Move the user uploaded img to our particular folder
                        $new_img_name = $time.$img_name;
                        
                        if (move_uploaded_file($tmp_name, "images/".$new_img_name)){ // If user upload img move to our folder succesfully
                            $status = "Active now"; // Once user signup then his status will be active now
                            $random_id = rand(time(), 10000000); // Creating random id for user

                            // Insert all data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                                 VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if ($sql2) { // If these data inserted 
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if (mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // Using this session we used user unique_id in other php file
                                    echo "success";
                                }
                            } else {
                                echo "Something went wrong!";
                            }
                        }

                    } else {
                        echo "Please select an Image file - .jpeg, jpg, png";
                    }

                } else {
                    echo "Please select an Image file!";
                }
            }
        } else {
            echo "$email - This is not a valid email!";
        }
    } else {
        echo "All input field are required!";
    }
?>