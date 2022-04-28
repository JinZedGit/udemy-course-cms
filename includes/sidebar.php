<!-- Blog Sidebar Column -->
<div class="col-md-4">
<?php

if(isset($_POST['search'])){

    $search = $_POST['search'];
    
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

?>

    <!-- Login Well -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="POST">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Username">
            </div>
            <div class="input-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
                <span class="input-group-btn">
                    <input value="Login" name="login" type="submit" class="form-control btn btn-primary">
                </span>
            </div>
        </form>
    </div>

    <!-- Blog Search Well -->
    <div class="well">
        <form method="POST" action="search.php">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="button">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>

    <!-- Blog Categories Well -->

    <?php

        $query = "SELECT * FROM categories";
        $select_all_categories_query = mysqli_query($connection, $query);

    ?>

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php 
          
                        while($row = mysqli_fetch_assoc($select_all_categories_query)){
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                        }

                    ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php"; ?>

</div>

</div>

<hr>