<?php
    include_once('sidenav.php')
?>
    <div class="container">
        <a class="btn btn-outline-primary btn-block mb-3" href="new-post.php" role="button">Add new post</a>            
        <?php
            // connect with database
            include_once('include/database.php');
            // selecting posts from posts table
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($db, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck < 1) {
                echo "<div class='jumbotron'>";
                    echo "<p> No posts to publish yet add posts </p>";
                echo "</div>";
            } else{
            
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='jumbotron'>";
                        echo "<div id='img_div'>";
                            echo "<h4>" . $row["postTitle"] . "</h4>";
                            echo "<img src='img/postsuploads/" . $row["postImage"] . "' class='image-responsive' width='200px' height='200px'>";
                            echo "<p class='lead' style='margin-top: 20px'>" . $row["postBody"] . "</p>";
                        echo "</div>";
                    echo "</div>";
                }
            }
        
        ?>
    </div>
<?php require_once('include/footer.html'); ?>