<?php

    if(isset($_GET['update'])){

        $update_id = $_GET['update'];

        $query = "SELECT * FROM categories WHERE cat_id = $update_id";
        $select_categories = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_categories)){
        
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="cat_title">Edit Category</label>
                    <input name="update_category" class="form-control" type="text"
                        value="<?php if(isset($cat_title)){echo $cat_title;} ?>">
                </div>
                <div class="form-group">
                    <input name="submit" class="btn btn-primary" type="submit" value="Update Category">
                </div>
            </form>
            <?php
        }
    }

if(isset($_POST['update_category'])){

    $update_cat = $_POST['update_category'];
    
    $query = "UPDATE categories SET cat_title = '$update_cat' WHERE cat_id = $cat_id";
    $update_query = mysqli_query($connection, $query);
    header("Location: categories.php");

}


?>