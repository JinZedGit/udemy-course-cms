<?php 
    ob_start(); 
    session_start();
    include('../includes/db.php'); 
    include('functions.php');

    if(!isset($_SESSION['user_role'])){ 

        header("Location: ../index.php");

    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Additional CSS -->
    <link href="css/admin-style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- Summernote -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Google Dashboard -->    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],

                <?php 
                
                $query = "SELECT * FROM posts WHERE `post_status` = 'Published'";
                $active_posts_query = mysqli_query($connection, $query);
                $active_posts_count = mysqli_num_rows($active_posts_query);

                $query = "SELECT * FROM posts WHERE `post_status` = 'Draft'";
                $draft_posts_query = mysqli_query($connection, $query);
                $draft_posts_count = mysqli_num_rows($draft_posts_query);

                $query = "SELECT * FROM comments WHERE `comment_status` = 'Approved'";
                $comments_count_query = mysqli_query($connection, $query);
                $comments_count = mysqli_num_rows($comments_count_query);

                $query = "SELECT * FROM comments WHERE `comment_status` = 'unapporved'";
                $pending_comments_count_query = mysqli_query($connection, $query);
                $pending_comments_count = mysqli_num_rows($pending_comments_count_query);

                $query = "SELECT * FROM users";
                $users_count_query = mysqli_query($connection, $query);
                $users_count = mysqli_num_rows($users_count_query);

                $query = "SELECT * FROM categories";
                $categories_count_query = mysqli_query($connection, $query);
                $categories_count = mysqli_num_rows($categories_count_query);

                $element_test = ['Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Categories'];
                $element_value = [$active_posts_count, $draft_posts_count, $comments_count, $pending_comments_count, $users_count, $categories_count];

                for($i = 0 ; $i < 6 ; $i++){
                
                    echo "['". $element_test[$i] . "', ". $element_value[$i] . "],";
                
                }

                ?>
            ]);

            var options = {
                chart: {
                    title: '',
                    subtitle: '',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    
</head>

<body>
    <div id="wrapper">