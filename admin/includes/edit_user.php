<?php 

    if(isset($_GET['edit_user'])){
        $get_user_id = $_GET['edit_user'];
        $query = "SELECT * FROM users WHERE user_id = $get_user_id ";
        $select_user_by_id = mysqli_query($connection, $query);     
        confirm($select_user_by_id);

        while($row = mysqli_fetch_assoc($select_user_by_id)) {
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
        }
    }
    if(isset($_POST['edit_user'])){
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
            $query .= "WHERE user_id = {$get_user_id} ";
           
            $update_user = mysqli_query($connection, $query);     
            confirm($update_user);
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

-