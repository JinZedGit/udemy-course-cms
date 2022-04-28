<?php 

if(isset($_POST['checkedArray'])){

    foreach($_POST['checkedArray'] as $postValueId){

        $bulk_option = $_POST['bulk_option'];

        switch($bulk_option){

            case 'Published':
                $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$postValueId'";
                $status_update_query = mysqli_query($connection, $query);
            break;

            case 'Draft':
                $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$postValueId'";
                $status_draft_query = mysqli_query($connection, $query);
            break;

            case 'Delete':
                $query = "DELETE FROM posts WHERE post_id = '$postValueId'";
                $status_delete_query = mysqli_query($connection, $query);
            break;
        }

    }

}

?>
<form action="" method="POST">
    <div class="col-xs-4">
        <select class="form-control" name="bulk_option" id="">
            <option selected hidden value="">Select Option</option>
            <option value="Draft">Draft</option>
            <option value="Published">Publish</option>
            <option value="Delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input class="btn btn-success" type="submit" value="Submit"></input>
        <a class="btn btn-primary" href="posts.php?source=post_create">Add New</a>
    </div>
    <table class="table table-border table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllChecks" class="checkbox"></th>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Content</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>

            <?php

                            $query = "SELECT * FROM posts";
                            $read_posts = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($read_posts)){

                                $post_id = $row['post_id'];
                                $post_category = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_status = $row['post_status'];

                                echo "<tr>";
                                echo "<th><input type=\"checkbox\" class=\"checkboxes\" name=\"checkedArray[]\" value=\"". $post_id ."\"></th>";
                                echo "<th>". $post_id ."</th>";
                                echo "<th>". $post_title ."</th>";
                                echo "<th>". $post_author ."</th>";
                                echo "<th style=\"word-break: break-word;\">". $post_content ."</th>";

                                $query = "SELECT * FROM categories WHERE cat_id = $post_category";
                                $categories_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($categories_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                }

                                echo "<th>". $cat_title ."</th>";
                                echo "<th>". $post_status ."</th>";
                                echo "<th><img class=\"img-responsive\" src='../images/".$post_image."'></th>";
                                echo "<th>". $post_tags ."</th>";
                                echo "<th>". $post_comment_count ."</th>";
                                echo "<th>". $post_date ."</th>";
                                echo "<th><a href=\"../post.php?post_id=". $post_id ."\">View Post</a></th>";
                                echo "<th><a href=\"posts.php?source=post_update&edit_id=". $post_id ."\">Edit</a></th>";
                                echo "<th><a href=\"posts.php?delete_id=". $post_id ."\">Delete</a></th>";
                                echo "</tr>";
                            }

                        if(isset($_GET['delete_id'])){

                            $post_delete_id = $_GET['delete_id'];

                            $query = "DELETE FROM posts WHERE post_id = $post_delete_id";
                            $post_delete_query = mysqli_query($connection, $query);
                            
                            header('Location: posts.php');

                        }
                        
                        ?>


        </tbody>
    </table>
</form>