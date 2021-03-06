<?php 
    if(isset($_POST['create_user'])){
        $user_firstname = escape($_POST['user_firstname']);
        $user_lastname = escape($_POST['user_lastname']);
        $user_role = escape($_POST['user_role']);
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $user_name = escape($_POST['user_name']);
        $user_email = escape($_POST['user_email']);
        $user_password = escape($_POST['user_password']);
        
//        move_uploaded_file($post_image_temp, "../images/$post_image");
        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12)); 
        $query = "INSERT INTO users(user_name, user_password, user_firstname, user_lastname, user_email,  user_role) ";
        $query .= "VALUES ('{$user_name}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}') ";
        
        $create_user_query = mysqli_query($connection, $query);
        confirm($create_user_query);
        
        echo "<p class='bg-success'>User Created: ". " " . "<a href='users.php'>View Users</a></p> ";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
     <div class="form-group">
        <label for="user_role">User Role</label><br/>
        <select name="user_role" id="">
            <option value="subscriber">Select Option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
  
<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
-->
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" >
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password" >
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
    </div>
</form>