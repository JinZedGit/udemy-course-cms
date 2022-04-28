<?php 

    if(isset($_GET['edit_id'])){

        $update_post_id = $_GET['edit_id'];
        
    }

    $query = "SELECT * FROM posts WHERE post_id = $update_post_id";
    $update_posts = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($update_posts)){

        $post_category = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];

    }

    if(isset($_POST['post_update'])){
        
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
    
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        move_uploaded_file($post_image_temp, "../images/$post_image");

        if(empty($post_image)){

            $query = "SELECT * FROM posts WHERE post_id = $update_post_id";
            $update_posts = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($update_posts)){
                $post_image = $row['post_image'];
            }

        }

        $query = "UPDATE posts SET post_title = '$post_title', post_category_id = '$post_category', post_date = now(), post_author = '$post_author', post_status = '$post_status', post_tags = '$post_tags', post_content = '$post_content', post_image = '$post_image' WHERE post_id = '$update_post_id'";
        $update_query = mysqli_query($connection, $query);

        echo "<p class=\"alert-success\">Post Updated. <a href='../post.php?post_id=". $update_post_id ."'>View Post</a> or <a href='posts.php'>Edit more posts</a></p>";
        echo $update_post_id;
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo  $post_author ?>">
    </div>
    <div class="form-group">
        <label for="">Category</label>
        <select class="form-control" name="post_category_id" id="">
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
        <label for="post_status">Status</label>
        <select class="form-control" name="post_status" id="">

            <option value="<?php echo $post_status?>"><?php echo $post_status?></option>

            <?php 
            
            if($post_status == 'Published'){

                echo "<option value='Draft'>Draft</option>";

            }else{

                echo "<option value='Published'>Publish</option>";

            }

            ?>

        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image">
    </div>
    <img class="img-responsive" src="../images/<?php echo $post_image ?>" alt=""><br>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="summernote" cols="30" rows="10" type="text" class="form-control"
            name="post_content"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input name="post_update" type="submit" class="btn btn-primary" value="Update Post">
    </div>
</form>
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300
        });
    });
</script>
