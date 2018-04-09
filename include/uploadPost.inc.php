<?php
    // adding new post script

    // errors show in php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Connect with Database
    include_once('database.php');
    
    // on submit the form
    if (isset($_POST['submit'])) {

        $postTitle = $_POST['title'];
        $postBody = $_POST['body'];

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpeg', 'jpg', 'png', 'gif', 'pdf', 'doc', 'docx');

        if (in_array($fileActualExt, $allowed)) {

            if ($fileError === 0) {

                if ($fileSize < 500000 ) {

                    $fileNameNew =  $postTitle . "." . $fileActualExt;

                    $fileDestination = "../img/postsuploads/" . $fileNameNew;
                    
                    move_uploaded_file($fileTmpName, $fileDestination);
                    
                    $sql = "INSERT INTO posts(postTitle, postImage, postBody) VALUES ('$postTitle','$fileNameNew','$postBody')";
                    // stores the data into DB > table > posts
                    mysqli_query($db, $sql);

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
    }
    echo $fileError;
?>