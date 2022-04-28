<table class="table table-border table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php

                            $query = "SELECT * FROM users";
                            $read_users = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($read_users)){

                                $user_id = $row['user_id'];
                                $user_name = $row['user_name'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_email = $row['user_email'];
                                $user_image = $row['user_image'];
                                $user_role = $row['user_role'];

                                echo "<tr>";
                                echo "<th>". $user_id ."</th>";
                                echo "<th>". $user_name ."</th>";
                                echo "<th>". $user_firstname ."</th>";
                                echo "<th>". $user_lastname ."</th>";

                                /*$query = "SELECT * FROM categories WHERE cat_id = $post_category";
                                $categories_query = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($categories_query)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                }*/

                                echo "<th>". $user_email ."</th>";
                                echo "<th>". $user_image ."</th>";
                                echo "<th>". $user_role ."</th>";
                                echo "<th><a href=\"users.php?set_admin=". $user_id ."\">Set admin</a></th>";
                                echo "<th><a href=\"users.php?set_user=". $user_id ."\">Set user</a></th>";
                                echo "<th><a href=\"users.php?source=user_update&edit_id=". $user_id ."\">Edit</a></th>";
                                echo "<th><a href=\"users.php?delete_id=". $user_id ."\">Delete</a></th>";
                                echo "</tr>";
                            }

                        if(isset($_GET['delete_id'])){

                            $user_delete_id = $_GET['delete_id'];

                            $query = "DELETE FROM users WHERE `user_id` = $user_delete_id";
                            $user_delete_query = mysqli_query($connection, $query);
                            
                            header('Location: users.php');

                        }

                        if(isset($_GET['set_admin'])){

                            $user_set_admin = $_GET['set_admin'];
                
                            $query = "UPDATE users SET user_role = 'Admin' WHERE `user_id` = '$user_set_admin'";
                            $comment_approve_query = mysqli_query($connection, $query);
                            
                            header('Location: users.php');
                
                        }
                
                        if(isset($_GET['set_user'])){

                            $user_set_user = $_GET['set_user'];
                
                            $query = "UPDATE users SET user_role = 'User' WHERE `user_id` = '$user_set_user'";
                            $comment_approve_query = mysqli_query($connection, $query);
                            
                            header('Location: users.php');
                
                        }

                        ?>
                    </tbody>
                </table>