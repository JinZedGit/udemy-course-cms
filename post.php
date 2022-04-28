<?php 
    ob_start(); 
    session_start();
    include('includes/db.php');
    include('includes/header.php');
    include('includes/navigation.php');
?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
            </h1>

            <?php 

            if(isset($_GET['post_id'])){

                $selected_post_id = $_GET['post_id'];

            }
            
            $query = "SELECT * FROM posts WHERE post_id = $selected_post_id";
            
            $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)){

                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>

            <h2>
                <a href="#"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
            <hr>
            <p><?php echo $post_content; ?></p><br>
            <?php } ?>

            
                <!-- Blog Comments -->

                <?php 
                
                if(isset($_POST['add_comment'])){

                    $comment_post_id = $_GET['post_id'];
                    $comment_author = $_POST['author'];
                    $comment_email = $_POST['email'];
                    $comment_text = $_POST['comment_text'];
                    $comment_date = date('d-m-y');

                    if(!empty($comment_author) && !empty($comment_email) && !empty($comment_text)){
                    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ('$comment_post_id', '$comment_author', '$comment_email', '$comment_text', 'unapproved', '$comment_date')";

                    $post_comment = mysqli_query($connection, $query);

                    $post_id = $_GET['post_id'];
                    $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $post_id";
                    $comment_counter = mysqli_query($connection, $query);

                    header('Location: post.php?post_id='.$post_id);
                    }else{
                        echo "<script>alert('Please, fill all the fields!')</script>";
                    }

                    
                    
                }

                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="POST">
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input required name="author" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input required type="email" name="email" class="form-control"></input>
                    </div>
                    <div class="form-group">
                        <label for="comment_text">Comment</label>
                        <textarea required name="comment_text" class="form-control" rows="3"></textarea>
                    </div>
                    <button name="add_comment" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->

                <div class="media">

                        <?php 

                        $post_id = $_GET['post_id'];

                        $query = "SELECT * FROM comments WHERE comment_status = 'Approved' AND comment_post_id = '$post_id'";
                        $comments_query = mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($comments_query)){
                        
                            $comment_author_print = $row['comment_author'];
                            $comment_content_print = $row['comment_content'];
                            $comment_date_print = $row['comment_date'];

                            
                            echo "<div class=\"media-body\"><h4 class=\"media-heading\">" . $comment_author_print;
                            echo "<small>   " . $comment_date_print . "</small></h4>". $comment_content_print ."</div><br>";

                        }

                        ?>
                </div>

        </div>

        <?php 
            include('includes/sidebar.php');
            include('includes/footer.php');
        ?>