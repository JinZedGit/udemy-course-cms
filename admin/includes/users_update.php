<?php 

    if(isset($_GET['edit_id'])){

        $update_user_id = $_GET['edit_id'];
        
    }

    $query = "SELECT * FROM users WHERE `user_id` = $update_user_id";
    $update_user = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($update_user)){

        $user_name = $row['user_name'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_pass = $row['user_pass'];

    }

    if(isset($_POST['update_user'])){
        
        $user_name = $_POST['user_name'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_pass = $_POST['user_pass'];

        /*$query = "SELECT user_salt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['user_salt'];
        $hashed_password = crypt($user_pass, $salt);*/

        $query = "UPDATE users SET `user_name` = '$user_name', `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', `user_email` = '$user_email', `user_role` = '$user_role', `user_pass` = '$hashed_password' WHERE `user_id` = '$update_user_id'";
        $update_query = mysqli_query($connection, $query);

        header("Location: users.php");
    }

?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input required type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input required type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input required type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input required type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <select class="form-control"  required name="user_role" id="" value="<?php echo $user_role; ?>">
            <option selected hidden value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

            <?php 
            
            if($user_role == 'Admin'){

                echo "<option value=\"User\">User</option>";

            }else{

                echo "<option value=\"Admin\">Admin</option>";

            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="user_pass">Password</label>
        <input required type="text" class="form-control" name="user_pass" value="<?php echo $user_pass; ?>">
    </div>
    <!--<div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" class="form-control" name="user_image">
    </div>-->
    <div class="form-group">
        <input name="update_user" type="submit" class="btn btn-primary" value="Update User">
    </div>
</form>