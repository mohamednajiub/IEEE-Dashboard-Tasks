<div class="container">
    <div class="jumbotron">
        <!-- Displaying the data -->
        <div class="col-sm-6 float-left">
            <div class="oldInfo" style="border-right: 1px solid #000">
                <table>
                    <thead>
                        <th><h3>User Data</h3></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3">
                                <img src="img/usersimages/<?php echo $_SESSION['userimage'] ?>" class="rounded" alt="<?php echo $_SESSION['fullname']?>" width="100px" height="100px">
                            </td>
                        </tr>
                        <tr>
                            <td class="lead" colspan="2"> Full Name : </td>
                            <td class="lead"><?php echo $_SESSION['fullname']; ?> </td>
                        </tr>
                        <tr>
                            <td class="lead" colspan="2"> user Name : </td>
                            <td class="lead"><?php echo $_SESSION['username']; ?> </td>
                        </tr>
                        <tr>
                            <td class="lead" colspan="2"> Email : </td>
                            <td class="lead"><?php echo $_SESSION['email']; ?> </td>
                        </tr>
                        <tr>
                            <td class="lead" colspan="2"> QR Code : </td>
                            <td>
                                <img src="QR_code.php?url=https://www.facebook.com/M.Emad97" class="rounded" alt="<?php echo $_SESSION['fullname']?>" width="100px" height="100px">
                            </td>
                        </tr>
                        <tr>
                        <td class="lead" colspan="2"> CurrentLink : </td>
                            <td><?php echo $actual_link ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Update Existing Data -->
        <div class="col-sm-6 float-right">

            <h3>Update Profile</h3>

            <!-- Preview panel -->
            <img src="" alt="" title="" id="img_preview" class="preview img-fluid rounded-circle mb-3 m-auto">

            <form method="POST" action="include/updateProfile.inc.php" enctype="multipart/form-data">

                <!-- image -->
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image" onchange="preview.call(this)" accept="image/*">
                        <label class="custom-file-label" for="image">Choose your image</label>
                    </div>
                </div>
                
                <!-- full name -->
                <div class="form-group">
                    <label for="fullname">full name:</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Full name" class="form-control" value="<?php echo $_SESSION['fullname'] ?>">
                </div>
                <!-- user name -->
                <div class="form-group">
                    <label for="username">user name:</label>
                    <input type="text" name="username" id="username" placeholder="user name" class="form-control" value="<?php echo $_SESSION['username'] ?>">
                </div>
                <!-- user name -->
                <div class="form-group">
                    <label for="username">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_SESSION['email'] ?>">
                </div>
                <!-- password -->
                <div class="form-group">
                    <label for="n-password">New password:</label>
                    <input type="password" name="npassword" id="n-password" placeholder="New Password" class="form-control" vlaue="<?php echo $_SESSION['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="Con-password">Confirm password:</label>
                    <input type="password" name="cpassword" id="Con-password" placeholder="Confirm Password" class="form-control" vlaue="<?php echo $_SESSION['password'] ?>">
                </div>
                <!-- Submit -->
                <div class="form-group float-right">
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>