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
                <div class="col-xs-6">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="cat_title">Add Category</label>
                            <input name="cat_title" class="form-control" type="text">
                        </div>
                        <div class="form-group">
                            <input name="submit" class="btn btn-primary" type="submit" value="Add Category">
                        </div>
                    </form>

                    <?php 
                        create_categories(); 
                        delete_categories();
                   
                        if(isset($_GET['update'])){
                        
                            $cat_id = $_GET['update'];

                            include('includes/update_categories.php');
                        
                        }

                    ?>
                    
                </div>
                <div class="col-xs-6">
                    <table class="table table-border table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Category Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php read_categories() ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/admin_footer.php');?>