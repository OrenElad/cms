<!-- /header -->
<?php include "./includes/admin_header.php" ?>
    <div id="wrapper">

        
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
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($connection, $query);
                            $posts_count = mysqli_num_rows($select_all_posts);
                            echo "<div class='huge'> $posts_count </div>";
                        ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php 
                            $query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($connection, $query);
                            $comments_count = mysqli_num_rows($select_all_comments);
                            echo "<div class='huge'> $comments_count </div>";
                        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                            $query = "SELECT * FROM users";
                            $select_all_users = mysqli_query($connection, $query);
                            $users_count = mysqli_num_rows($select_all_users);
                            echo "<div class='huge'> $users_count </div>";
                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($connection, $query);
                            $categories_count = mysqli_num_rows($select_all_categories);
                            echo "<div class='huge'> $categories_count </div>";
                        ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->
                
                <?php 
                     $query = "SELECT * FROM posts WHERE post_status = 'published' ";
                    $select_all_publish_posts = mysqli_query($connection, $query);
                    $posts_publish_count = mysqli_num_rows($select_all_publish_posts);     
                
                    $query = "SELECT * FROM posts WHERE post_status = 'draft' ";
                    $select_all_draft_posts = mysqli_query($connection, $query);
                    $posts_draft_count = mysqli_num_rows($select_all_draft_posts);                     
                
                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
                    $select_all_unapproved_comments = mysqli_query($connection, $query);
                    $unapproved_comments_count = mysqli_num_rows($select_all_unapproved_comments);                     
                
                    $query = "SELECT * FROM users WHERE user_role = 'subscriber' ";
                    $select_all_subscriber_users = mysqli_query($connection, $query);
                    $subscriber_count = mysqli_num_rows($select_all_subscriber_users);
                ?>
    <div class="row">
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php 
                $element_text  = ['All Posts', 'Active Posts', 'Draft Posts', 'Comments', 'Pending Comments', 'Users', 'Subscribers', 'Categories' ];
                $element_count  = [$posts_count, $posts_publish_count, $posts_draft_count, $comments_count, $unapproved_comments_count, $users_count, $subscriber_count, $categories_count ];
                for($i = 0; $i < 8; $i++){
                    echo "['{$element_text[$i]}'" . ", ". "{$element_count[$i]}],";
                }
            ?>
        ]);

        var options = {
          width: '100%',
          chart: {
            title: '',
            subtitle: ''
          },
          series: {
            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
          },
          axes: {
            y: {
              distance: {label: 'parsecs'}, // Left y-axis.
              brightness: {side: 'right', label: 'apparent magnitude'} // Right y-axis.
            }
          }
        };

      var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
      chart.draw(data, options);
    };
    </script>
    <div id="dual_y_div" style="width: 'auto'; height: 500px;"></div>
        </div>
        
    </div>
            <!-- /.container-fluid -->
        </div>
        
<!-- /footer -->
<?php include "./includes/admin_footer.php" ?>
