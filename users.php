<?php
    include_once('sidenav.php')
?>
    <div class="container">
        <?php
            // connect with database
            include_once('include/database.php');
            // selecting posts from posts table
            $sql = "SELECT * FROM users";
            $result = mysqli_query($db, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck < 1) {
                echo "<div class='jumbotron'>";
                    echo "<p> No users in Database </p>";
                echo "</div>";
            } else{
            
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='card bg-light mb-3'>";
                        echo "<div class='row'>";
                            if (empty($row['userImage']) !== false) {
                                echo "<img src='./img/default.png' class='card-img col-4 col-md-3' alt='" . $row['fullname'] . "' width='100px' height='200px'>";
                            } else {
                                echo "<img src='./img/usersimages/" . $row['userImage'] ." ' class='card-img col-4 col-md-3' alt='" . $row['fullname'] ."' width='100px' height='200px'>";
                            }
                            echo "<div class='col-8 col-md-7 mt-2'>";
                                echo "<a href='profile.php?" .  $row["id"] ."' ><h4>" . $row["fullname"] . "</h4></a>";
                                echo "<h4>" . $row["username"] . "</h4>";
                                echo "<p class='lead'> Join date: " . $row["join_date"] . "</p>";
                                echo "<img src='QR_code.php?url=https://www.facebook.com/M.Emad97' class='rounded' alt='" . $_SESSION['fullname'] ."' width='100px' height='100px'>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                }
            }
        ?>
    </div>
<?php require_once('include/footer.html'); ?>