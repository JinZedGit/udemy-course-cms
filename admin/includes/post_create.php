<?php 

if(isset($_POST['add_post'])){

    $post_title = $_POST['post_title'];
    /*$post_author = $_POST['post_author'];*/
    $post_author = $_SESSION['user_name'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES ('$post_category', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tags', '$post_status')";
    $add_post_query = mysqli_query($connection, $query);

    $last_id = mysqli_insert_id($connection);
    echo "<p class=\"alert-success\">Post Created. <a href='../post.php?post_id=". $last_id ."'>View Post</a> or <a href='posts.php?source=post_update&edit_id=". $last_id ."'>Edit post.</a></p>";
    /*header("Location: posts.php");*/

}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <!--<div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>-->
    <div class="form-group">
        <label for="">Category</label>
        <select class="form-control" name="post_category" id="">
            <?php 
            
            $query = "SELECT * FROM categories";
            $category_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($category_query)){

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='".$cat_id."'>".$cat_title."</option>";

            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select required class="form-control" name="post_status" id="">
            <option selected hidden value="">Select Option</option>
            <option value="Draft">Draft</option>
            <option value="Published">Publish</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="summernote" cols="30" rows="10" type="text" class="form-control" name="post_content"></textarea>
    </div>
    <div class="form-group">
        <input name="add_post" type="submit" class="btn btn-primary" value="Add Post">
    </div>
</form>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300
        });
    });
</script>