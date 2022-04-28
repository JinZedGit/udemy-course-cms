<?php  
include "includes/db.php";
include "includes/header.php";
include "includes/navigation.php"; 

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT user_salt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);

        /*$row = mysqli_fetch_array($select_randsalt_query);
        echo $salt = $row['user_salt'];
        echo $password = crypt($password, $salt);*/

        $query = "INSERT INTO users (user_name, user_pass, user_email, user_role) VALUES ('$username', '$password', '$email', 'User')";
        $register_query = mysqli_query($connection, $query);

        echo "<p class=\"alert-success\">User created successfully!</p>";

        $message = "Your registration has been submited!";

    }else{
        $message = "Fields cannot be empty!";
    }
}else{
    $message = "";
}



?>

<div class="container">
    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <h6 class="text-center"><?php if(isset($message)){echo $message;} ?></h6>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input required type="text" name="username" id="username" class="form-control"
                                    placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input required type="email" name="email" id="email" class="form-control"
                                    placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input required type="password" name="password" id="key" class="form-control"
                                    placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Register">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>

    <?php include "includes/footer.php";?>