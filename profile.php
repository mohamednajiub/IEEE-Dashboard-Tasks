<?php
    // call sidenav
    require_once('sidenav.php');
    include_once('include/database.php');
   
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    $pageID = explode('?', $actual_link);
    $pageActID = end($pageID);

    // getting actual Id data

    $sql = "SELECT * FROM users WHERE id='$pageActID'";
    $result = mysqli_query($db, $sql);
    $resultCheck = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);

    $row['id'];
    $row['fullname'];
    $row['username'];
    $row['email'];
    $row['password'];
    $row['userImage'];

    $id =  $_SESSION['id'];

    // check if this my page or not
    if ($pageActID == $id ) {
        echo "<div class='jumbotron'>
        <!-- Displaying the data -->
        <div class='col-sm-6 float-left'>
            <div class='oldInfo' style='border-right: 1px solid #000'>
                <table>
                    <thead>
                        <th><h3>User Data</h3></th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan='3'>
                                <img src='img/usersimages/". $_SESSION['userimage'] ."' class='rounded' alt='" . $_SESSION['fullname'] ."' width='100px' height='100px'>
                            </td>
                        </tr>
                        <tr>
                            <td class='lead' colspan='2'> Full Name : </td>
                            <td class='lead'>". $_SESSION['fullname'] ." </td>
                        </tr>
                        <tr>
                            <td class='lead' colspan='2'> user Name : </td>
                            <td class='lead'>".$_SESSION['username']." </td>
                        </tr>
                        <tr>
                            <td class='lead' colspan='2'> Email : </td>
                            <td class='lead'>". $_SESSION['email']." </td>
                        </tr>
                        <tr>
                            <td class='lead' colspan='2'> QR Code : </td>
                            <td>
                                <img src='QR_code.php?url=".$actual_link." class='rounded' alt='".$_SESSION['fullname']."' width='100px' height='100px'>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Update Existing Data -->
        <div class='col-sm-6 float-right'>

            <h3>Update Profile</h3>

            <!-- Preview panel -->
            <img src='' alt='' title='' id='img_preview' class='preview img-fluid rounded-circle mb-3 m-auto'>

            <form method='POST' action='include/updateProfile.inc.php' enctype='multipart/form-data'>

                <!-- image -->
                <div class='input-group mb-3'>
                    <div class='input-group-prepend'>
                        <span class='input-group-text'>Upload</span>
                    </div>
                    <div class='custom-file'>
                        <input type='file' name='image' class='custom-file-input' id='image' onchange='preview.call(this)' accept='image/*'>
                        <label class='custom-file-label' for='image'>Choose your image</label>
                    </div>
                </div>
                
                <!-- full name -->
                <div class='form-group'>
                    <label for='fullname'>full name:</label>
                    <input type='text' name='fullname' id='fullname' placeholder='Full name' class='form-control' value='".$_SESSION['fullname']."'>
                </div>
                <!-- user name -->
                <div class='form-group'>
                    <label for='username'>user name:</label>
                    <input type='text' name='username' id='username' placeholder='user name' class='form-control' value='".$_SESSION['username']." '>
                </div>
                <!-- user name -->
                <div class='form-group'>
                    <label for='username'>Email:</label>
                    <input type='text' name='email' id='email' placeholder='Email' class='form-control' value='".$_SESSION['email']."'>
                </div>
                <!-- password -->
                <div class='form-group'>
                    <label for='n-password'>New password:</label>
                    <input type='password' name='npassword' id='n-password' placeholder='New Password' class='form-control' vlaue='".$_SESSION['password']."'>
                </div>
                <div class='form-group'>
                    <label for='Con-password'>Confirm password:</label>
                    <input type='password' name='cpassword' id='Con-password placeholder='Confirm Password' class='form-control' vlaue='".$_SESSION['password']."'>
                </div>
                <!-- Submit -->
                <div class='form-group float-right'>
                    <button type='submit' name='update' class='btn btn-primary'>Submit</button>
                </div>
            </form>
        </div>
        <div class='clearfix'></div>
    </div>
</div>";
    } else {
        echo "
        <div class='jumbotron'>
            <!-- Displaying the data -->
            <div class='col-sm-12'>
                <div class='oldInfo'>
                    <table>
                        <thead>
                            <th><h3>User Data</h3></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan='3'>
                                    <img src='img/usersimages/".$row['id']."' class='rounded' alt='".$row['fullname']."' width='100px' height='100px'>
                                </td>
                            </tr>
                            <tr>
                                <td class='lead' colspan='2'> Full Name : </td>
                                <td class='lead'>".$row['fullname']." </td>
                            </tr>
                            <tr>
                                <td class='lead' colspan='2'> user Name : </td>
                                <td class='lead'>".$row['username']." </td>
                            </tr>
                            <tr>
                                <td class='lead' colspan='2'> Email : </td>
                                <td class='lead'>". $row['email']." </td>
                            </tr>
                            <tr>
                                <td class='lead' colspan='2'> QR Code : </td>
                                <td>
                                    <img src='QR_code.php?url=".$actual_link." class='rounded' alt='".$row['fullname']."' width='100px' height='100px'>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>";
    }
?>

<script>
    function preview() {
        'use strict';
        if(this.files && this.files[0]) {
            let reader = new FileReader();
            reader.onload = function (data) {
                'use strict';
                let img_preview = document.getElementById("img_preview");
                img_preview.src = data.target.result;
                img_preview.style.display = "block";
                img_preview.style.width = "200px";
                img_preview.style.height = "200px";
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
</script>
<?php require_once('include/footer.html'); ?>