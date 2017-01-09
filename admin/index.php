<!-- /header -->
<?php include "./includes/admin_header.php" ?>
    <div id="wrapper">

        <?php if($connection) echo "You're connected"?>
        <!-- Navigation -->
        <?php include "./includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['user_name']; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
<!-- /footer -->
<?php include "./includes/admin_footer.php" ?>
