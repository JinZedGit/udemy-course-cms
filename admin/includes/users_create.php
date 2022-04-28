<?php 

if(isset($_POST['add_user'])){

    $user_name = $_POST['user_name'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_role = $_POST['user_role'];

    /*$post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];


    move_uploaded_file($post_image_temp, "../images/$post_image");*/

    /*$query = "INSERT INTO users(user_id, user_name, user_firstname, user_lastname, user_email, user_pass) VALUES ('$user_id', '$user_name', '$user_firstname', '$user_lastname', '$user_email', '$user_pass')";*/
    $query = "INSERT INTO `users`(`user_name`, `user_pass`, `user_firstname`, `user_lastname`, `user_email`, `user_role`) VALUES ('$user_name', '$user_pass', '$user_firstname', '$user_lastname', '$user_email', '$user_role')";
    $add_user_query = mysqli_query($connection, $query);

    if($add_user_query){

        echo "<p class=\"alert-success\">User created successfully. <a href=\"users.php\">View all users.</a></p>";

    }

    //header("Location: users.php");

}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input required type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input required type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input required type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input required type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <select class="form-control"  required name="user_role" id="">
            <option disabled selected hidden value="">Select Role</option>
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_pass">Password</label>
        <input required type="text" class="form-control" name="user_pass">
    </div>
    <!--<div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" class="form-control" name="user_image">
    </div>-->
    <div class="form-group">
        <input name="add_user" type="submit" class="btn btn-primary" value="Add User">
    </div>
</form>