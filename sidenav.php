<?php
    // add head
    include_once('include/head.php');
?>
<div class="container"> <!-- opening container and it close in footer.html -->
    <nav class="navbar navbar-light navbar-static bg-faded" role="navigation">
        <!-- when opening menu overlay -->
        <div class="overlay"></div>
        <!-- Brand Name -->
        <a class="navbar-brand" href="posts.php">IEEE Helwan Student Branch</a>
        <!-- Nav Button -->
        <ul class="nav navbar-nav">
            <button class="navbar-toggler float-right" id="navbarSideButton" type="button">
                &#9776;
            </button>
        </ul>
        <!-- navbar-side -->
        <ul class="navbar-side col-lg-4 col-md-7 col-10" id="navbarSide">
            <!-- volunteer Data for all positions -->
            <li class="navbar-side-item side-link">
                <figure class="volunteer-data">
                    <div class="row">
                        <?php
                            if (empty($_SESSION['userimage']) !== false) {
                                echo '<img src="./img/default.png" class="rounded-circle col-4" alt="', $_SESSION['fullname'] ,'" width="100px" height="100px">';
                            } else {
                                echo '<img src="./img/usersimages/' . $_SESSION['userimage'] . '" class="rounded-circle col-4" alt="', $_SESSION['fullname'] ,'" width="100px" height="100px">';
                            }
                        ?>
                        
                        <figcaption class="col-8 mt-3">
                            <div class="row">
                                <span class="h4">
                                    <?php
                                        echo $_SESSION['fullname'];
                                    ?>
                                </span>
                            </div>
                            <div class="lead">
                                <span class="lead">
                                    <?php
                                        echo $_SESSION['username'];
                                    ?>
                                </span>
                            </div>
                        </figcaption>
                    </div>
                </figure>
            </li>
            <!-- posts & add posts -->
            <li class="navbar-side-item">
                <a href="posts.php" class="side-link">Home</a>
            </li>
            <!-- users -->
            <li class="navbar-side-item">
                <a href="users.php" class="side-link">Users</a>
            </li>
            
            <!-- Edit page  -->
            <li class="navbar-side-item">
                <a href="profile.php" class="side-link">Setting</a>
            </li>
            <!-- logout -->
            <li class="navbar-side-item">
                <a href="include/logout.inc.php" class="side-link">logout</a>
            </li>
            <!-- My QR Code -->
            <li class="mt-5 ml-5">
                <img src="QR_code.php?url=https://www.facebook.com/M.Emad97" class="rounded" alt="<?php echo $_SESSION['fullname']?>" width="100px" height="100px">
            </li>
        </ul>
    </nav>
