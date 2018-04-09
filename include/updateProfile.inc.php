<?php
    // session Start 
    session_start();
    // connect with database
    include_once('database.php');
    // select all from users table
    $sql = "SELECT * FROM users";

    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {

            $id =  $_SESSION['id'];

            if ( isset($_POST['update']) ) {

                $fullname = $_POST['fullname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['npassword'];
                // check the inputs
                if ( empty($file) && empty($fullname) && empty($username) && empty($email) && empty($password) ) {

                    header('Location: ../profile.php?noThingToUpdate');

                } else {
                    // check if image is empty
                    if (!empty($file) || !empty($fullname) || !empty($username) || !empty($email) || !empty($password) ) {

                        if ( $_POST['npassword'] == $_POST['cpassword'] ) {

                            if ( empty($_POST['npassword']) ) {
                                header('Location: ../index.php?Password!Changed');
                            } else {
                                $sql = "UPDATE users SET password = '$password' WHERE id = '$id' ";
                                mysqli_query($db, $sql);
                            }
                        }

                        // Validate and Upload the file
                        // get image info
                        $file        = $_FILES['image'];
                        $fileName    = $_FILES['image']['name'];
                        $fileTmpName = $_FILES['image']['tmp_name'];
                        $fileSize    = $_FILES['image']['size'];
                        $fileType    = $_FILES['image']['type'];
                        $fileError   = $_FILES['image']['error'];
        
                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));
        
                        $allowed = array('jpeg', 'jpg', 'png', 'gif', 'mp4');
        
                        if ( in_array($fileActualExt, $allowed) ) {

                            if ($fileError === 0) {

                                if ($fileSize < 500000 ) {

                                    $fileNameNew =  $username . "." . $fileActualExt;

                                    $fileDestination = "../img/usersimages/" . $fileNameNew;
                                    
                                    move_uploaded_file($fileTmpName, $fileDestination);
                                    
                                    $sqlImage = "UPDATE users SET userImage = '$fileNameNew' WHERE id = '$id'";
                                    // stores the data into DB > table > posts
                                    mysqli_query($db, $sqlImage);

                                    header('Location: ../posts.php?SuccessUpload');
                                } else {
                                    echo 'Your file is big than 50 MB';
                                }

                            } else {
                                echo 'there was an error uploading your file';
                            }

                        } else {
                            echo 'you cannot upload this files of this type!';
                        }

                        $sql = "UPDATE users SET fullname = '$fullname', username = '$username', email = '$email', userImage = '$fileNameNew' WHERE id = '$id'";

                        mysqli_query($db,$sql);

                        session_unset();
                        session_destroy();

                        header('Location: ../index.php');
                    }
                }
            }
        }
    }
        

        
    // Update Data
    

    /*
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "UPDATE users SET fullname=[$fullname], email=[$email], password = [$password] WHERE 1";
        // make sure is query successful
        if(mysqli_query($db, $sql) === true){
            echo 'done';
            
        } else {
            //faild
            echo 'failed';
        }
    }
    */
?>