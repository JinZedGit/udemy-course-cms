<?php 

function create_categories(){

    global $connection;

    if(isset($_POST['submit'])){
    
        $cat_title = $_POST['cat_title'];
    
        if($cat_title == "" || empty($cat_title)){
            echo "Please enter a Category";
        }
        else{
            $query = "INSERT INTO categories (cat_id, cat_title) VALUES ('', '$cat_title')";
            $add_categories = mysqli_query($connection, $query);
            echo "Category added";
        }
    
    }
}

function read_categories(){
             
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories)){
    
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr><td>".$cat_id."</td><td>".$cat_title."</td><td><a href=\"categories.php?delete=". $cat_id."\">Delete</a></td><td><a href=\"categories.php?update=". $cat_id."\">Update</a></td></tr>";
    
    }
}

function update_categories(){

    if(isset($_GET['update'])){
                        
        $cat_id = $_GET['update'];

        include('includes/update_categories.php');
                        
    }
}

function delete_categories(){

    global $connection;

    if(isset($_GET['delete'])){

        $delete_cat_id = $_GET['delete'];
        
        $query = "DELETE FROM categories WHERE cat_id = $delete_cat_id";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }

}



?>