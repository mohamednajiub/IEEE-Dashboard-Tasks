<?php
// start session
session_start();
// Start login form
if(isset($_POST['login'])){
    // connect with database
    include_once('database.php');
    // assign Email & Password
    $email = mysqli_real_escape_string($db,$_POST['email']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    // Errorhandaling
    // - check if inputs is empty
    if (empty($email) || empty($password)) {
        header("Location: ../register.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
            header("Location: ../register.php?login=NoUsers");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                /* Dehashing the password
                $hasedPasswordCheck = password_verify($password, $row['password']);
                if ($hasedPasswordCheck == false) {
                    header("Location: ../register.php?login=error");
                    exit();
                } elseif($hasedPasswordCheck == true){
                    //login the user */
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fullname'] = $row['fullname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['userimage'] = $row['userImage'];
                    header('Location: ../posts.php?login=success');
                    exit();
                }
            }
        }
    
} else {
        header("Location: ../register.php?login=error");
        exit();
    }
?>