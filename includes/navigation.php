<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

    <div class="container">

        <div class="navbar-header">
            <!-- Brand and toggle get grouped for better mobile display -->
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav">
            <?php
            
            $query = "SELECT * FROM categories";
            $select_all_categories_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_all_categories_query)){

                $cat_title = $row['cat_title'];
                echo "<li><a href='#'>{$cat_title}</a></li>";

            }
            
            if(isset($_SESSION['user_role'])){

                echo "<li><a href='admin'>Admin</a></li>";

                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    echo "<li><a href='admin/posts.php?source=post_update&edit_id=". $post_id ."'>Edit Post</a></li>";
                    
                }
            }

            
            ?>
            <li><a href="registration.php">Register</a><li>
            </ul>
        </div>

    </div>
    
</nav>