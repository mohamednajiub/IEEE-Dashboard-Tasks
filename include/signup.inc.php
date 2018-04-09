<?php
// Start Registration form
if(isset($_POST['register'])){
    include_once('database.php');
    // Make sure Password Matches
    if ($_POST['password'] == $_POST['re-password']) {
        // create new user
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        //Error handling 
        // Check for empty inputs
        if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
            header('Location: ../register.php?signup=empty');
            exit();
        } else {
            // check if the input are valid
            if (!preg_match("/^[a-zA-Z\s]*$/", $fullname)) {
                header('Location: ../register.php?signup=invalidname');
                exit();
            } else {
                // Check if email is valid 
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header('Location: ../register.php?signup=invalidemail');
                    exit();
                } else {
                    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
                    $result = mysqli_query($db, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    
                    if ($resultCheck > 0) {
                        header('Location: ../register.php?signup=emailORusernameistaken');
                        exit();
                    } else {
                        // hashing the password
                        $hashed_password = password_hash($password, passwordDefault);
                        // Insert the user into the database
                        $sql = "INSERT INTO users (fullname, username, email, password)" . "VALUES ('$fullname', '$username', '$email', '$password');";
                        mysqli_query($db, $sql);
                        header('Location: ../register.php?signup=Success');
                        exit();
                    }
                }
            }
        }
    } else {
        header('Location: ../register.php?password!=pssword');
        exit();
    } // End Registration form
}
?>