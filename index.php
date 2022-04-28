<?php 
ob_start(); 
    session_start();
    include('includes/db.php');
    include('includes/header.php');
    include('includes/navigation.php');
    
?>
<!-- TEST -- >
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

            $per_page = 10;

            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }else{
                $page = "";
            }

            if($page == "" || $page == 1){
                $page_1 = 0;
            }else{
                $page_1 = ($page * $per_page) - $per_page;
            }
            
            $post_count = "SELECT * FROM posts WHERE post_status = 'published'";
            $find_count = mysqli_query($connection, $post_count);
            $count = mysqli_num_rows($find_count);

            echo $pages_num = ceil($count / $per_page);

            $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_1, $per_page";
            
            $select_all_posts_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_posts_query)){
                
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 150);

            ?>

            <h2>
                <a href="post.php?post_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="author.php?author=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
            <hr>
            <a href="post.php?post_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt=""></a>
            <hr>
            <p style="word-break: break-word;"><?php echo $post_content . "..."; ?></p><br>
            <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>"><strong>Read More </strong><span class="glyphicon glyphicon-chevron-right"></a>
            
            <?php } ?>



            <!-- First Blog Post -->


        </div>

        <?php include('includes/sidebar.php'); ?>

        <ul class="pager">
            <?php 
        
                for($i = 1 ; $i <= $pages_num ; $i++){
                    if($i == $page){
                        echo "<li><a class='active' href='index.php?page=".$i."'>" . $i . "</a></li>";
                    }else{
                        echo "<li><a href='index.php?page=".$i."'>" . $i . "</a></li>";
                    }
                }

            ?>
        </ul>

        <?php include('includes/footer.php'); ?>
