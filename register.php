<?php
    require_once('include/head.php');
?>
<body>
    <div class="container">
        <div class="row">
            <img src="img/ieee_logo.jpg" alt="logo" height="200px" class="m-auto" title="logo">
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="register">
                    <h2 style="color:#0076A1;">Register</h2>
                    <form  method="POST" action="include/signup.inc.php">
                        <!-- Form Data -->
                        <div class="form-group">
                            <label for="fullname">Full Name:</label>
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="full name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">User name:</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="user name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="yourmail@domain.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                        </div>
                        <div class="form-group">
                            <label for="re-password">Re-Password:</label>
                            <input type="password" name="re-password" class="form-control" id="re-password" placeholder="Re-password" required>
                        </div>
                        <!-- Submit -->
                        <div class="form-group">
                            <button type="submit" name="register" class="btn btn-primary btn-block">SignUp</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="signIn">
                    <h2 style="color:#0076A1;">Sign in</h2>
                    <form  method="POST" action="include/login.inc.php">
                        <!-- Form Data -->
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                        <!-- Submit -->
                        <div class="form-group"><button type="submit" name="login" class="btn btn-primary btn-block">Login</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require_once('include/footer.html'); ?>