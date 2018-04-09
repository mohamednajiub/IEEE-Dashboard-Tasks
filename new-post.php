<?php
    include_once('sidenav.php');
?>
<div class="col-md-6 m-auto">
    <!-- start new post form -->
    <form action="include/uploadPost.inc.php" method="post" enctype="multipart/form-data">
        <!-- post name -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter Article Heading" name="title">
        </div>
        <!-- file uploader -->
        <div class="form-group">
            <label for="file">upload image</label>
            <input type="file" class="form-control form-control-file" id="file" name="file">
        </div>
        <!-- post body -->
        <div class="form-group">
            <label for="body">Post Details</label>
            <textarea class="form-control" id="body" rows="5" name="body"></textarea>
        </div>
        <!-- add button -->
        <button type="submit" name="submit" class="btn btn-primary float-right">Post</button>
        <div class="clearfix"></div>
    </form>
</div>
<?php require_once('include/footer.html'); ?>

<!-- uniqid('', true) -->