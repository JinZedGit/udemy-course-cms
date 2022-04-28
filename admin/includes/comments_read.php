<table class="table table-border table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>From</th>
            <th>Content</th>
            <th>In Response To</th>
            <th>Status</th>
            <th>Date</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
                        
        <?php

        $query = "SELECT * FROM comments";
        $read_comments = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($read_comments)){

            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<th>". $comment_id ."</th>";
            echo "<th>". $comment_author ."</th>";
            echo "<th>". $comment_email ."</th>";
            echo "<th style=\"word-break: break-word;\">". $comment_content ."</th>";

            /*$query = "SELECT * FROM categories WHERE cat_id = $post_category";
            $categories_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($categories_query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            }*/

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $get_id_tittle = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($get_id_tittle)){

                $post_id = $row['post_id'];
                $post_title = $row['post_title'];

                echo "<th><a href=\"../post.php?post_id=". $post_id ."\">" . $post_title . "</a></th>";

            }

            echo "<th>". $comment_status ."</th>";
            echo "<th>". $comment_date ."</th>";
            echo "<th><a href='comments.php?approve=" . $comment_id . "'>Approve</a></th>";
            echo "<th><a href='comments.php?unapprove=" . $comment_id . "'>Unapprove</a></th>";
            echo "<th><a href='comments.php?delete_id=" . $comment_id . "'>Delete</a></th>";
            echo "</tr>";

        }

        if(isset($_GET['delete_id'])){

            $comment_delete_id = $_GET['delete_id'];

            $query = "DELETE FROM comments WHERE comment_id = $comment_delete_id";
            $comment_delete_query = mysqli_query($connection, $query);
            
            header('Location: comments.php');

        }

        if(isset($_GET['approve'])){

            $comment_approve_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'Approved' WHERE comment_id = '$comment_approve_id'";
            $comment_approve_query = mysqli_query($connection, $query);
            
            header('Location: comments.php');

        }

        if(isset($_GET['unapprove'])){

            $comment_unapprove_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'Unapproved' WHERE comment_id = '$comment_unapprove_id'";
            $comment_unapprove_query = mysqli_query($connection, $query);
            
            header('Location: comments.php');

        }
                        
        ?>
                            
                        
    </tbody>
</table>