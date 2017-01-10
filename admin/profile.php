<!-- /header -->
<?php include "./includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
<?php 
      if(isset($_SESSION['user_name'])){
         $user_name = $_SESSION['user_name'];
          $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
          $select_user_profile = mysqli_query($connection, $query);
          
          while ($row = mysqli_fetch_assoc($select_user_profile)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
           $user_password = $row['user_password'];
          }
      }                      
?>

<?php 
        if(isset($_POST['update_profile'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
//        move_uploaded_file($post_image_temp, "../images/$post_image");
        
           
            $query = "UPDATE users SET ";
            $query .= "user_firstname  =  '{$user_firstname}', ";
            $query .= "user_lastname  =  '{$user_lastname}', ";
            $query .= "user_role = '{$user_role}', ";
            $query .= "user_name = '{$user_name}', ";
            $query .= "user_email = '{$user_email}', ";
            $query .= "user_password = '{$user_password}' ";
            $query .= "WHERE user_name = '{$user_name}' ";
           
            $update_profile = mysqli_query($connection, $query);     
            confirm($update_profile);
//            if(empty($post_image)){
//                $query = "SELECT * FROM posts WHERE post_id = $edit_post_id ";
//                $select_image = mysqli_query($connection, $query);     
//                confirm($select_image);
//                while($row = mysqli_fetch_assoc($select_image)) {
//                    $post_image = $row['post_image'];
//                }
//            }

    }
?>
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
                            <small>Author</small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
  <form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
    </div>
      <div class="form-group">
        <label for="user_role">User Role</label><br/>
          <select name="user_role" id="">
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
              <?php 
                if($user_role == 'admin'){
                    echo "<option value='subscriber'>subscriber</option>";
                }else {
                    echo "<option value='admin'>admin</option>";
                }
              ?>
            
            
        </select>
<!--
        <select name="user_role" id="">
            <?php 
                $query = "SELECT * FROM users ";
                $select_users = mysqli_query($connection, $query);     
                confirm($select_users);
                while($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $user_role = $row['user_role'];
                    echo "<option value='$user_id'>{$user_role}</option>";
                }
            ?>
        </select>
-->
    </div>
  
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
-->
    <div class="form-group">
        <label for="user_name">Username</label>
        <input value="<?php echo $user_name; ?>" type="text" class="form-control" name="user_name">
    </div>    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email" >
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password" >
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
    </div>
</form>
        </div>

        
<!-- /footer -->
<?php include "./includes/admin_footer.php" ?>
