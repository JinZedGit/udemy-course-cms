<?php 

    include('includes/admin_header.php'); 
    include('includes/admin_navigation.php'); 
    include('includes/admin_side-navigation.php');

?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin
                    <small>This is the admin panel.</small>
                </h1>
                <div class="col-xs-12">
                
                    <?php                       
                    
                        if(isset($_GET['source'])){

                            $source = $_GET['source'];

                        }else{
                            $source = "";
                        }

                        switch($source){

                            case 'comment_create';
                            include('includes/post_create.php');
                            break;

                            case 'comment_update';
                            include('includes/post_update.php');
                            break;

                            case '3';
                            echo "Ha 3";
                            break;

                            case '4';
                            echo "Ha 4";
                            break;

                            default:
                            include('includes/comments_read.php');
                            break; 
                        }

                    ?>
                    
                    
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/admin_footer.php');?>