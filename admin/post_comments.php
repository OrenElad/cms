<!-- /header -->
<?php include "./includes/admin_header.php"; ?>
<?php include "functions.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "./includes/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome to Comments
                            <small>Author</small>
                        </h1>
<?php 
if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $commentValueId){
        $bulk_options = $_POST['bulk_options'];        
        echo $bulk_options;
        $query = "UPDATE comments SET comment_status = '$bulk_options' WHERE comment_id = {$commentValueId} " ;
        switch ($bulk_options) {
            case 'approved':
                $update_to_approved_status = mysqli_query($connection, $query);
                confirm($update_to_approved_status);
                break;
            case 'unapproved':
                $update_to_unapproved_status = mysqli_query($connection, $query);
                confirm($update_to_unapproved_status);
                break;
            case 'delete':
                $update_to_delete = mysqli_query($connection, $query);
                confirm($update_to_delete);
                break;
            default:
                # code...
                break;
        }
    }    
}
?>
<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="approved">Approve</option>
            <option value="unapproved">Unapprove</option>
            <option value="delete">Delete</option>

        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
    </div>
    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Content</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response to</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php 
         $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection, $_GET['id']);
        $select_comments = mysqli_query($connection, $query);     
        while($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
           
            echo "<tr>";
            ?>
            <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $comment_id?>'></td>
            <?php
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author }</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td>{$comment_date}</td>";

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_id_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
            }
            
            echo "<td><a href='post_comments.php?approved={$comment_id}&id=" . $_GET['id'] ."'>Approve</a> </td>";
            echo "<td><a href='post_comments.php?unapproved={$comment_id}&id=" . $_GET['id'] ."'>Unapprove</a> </td>";
            echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete?');\" href='post_comments.php?delete={$comment_id}&id=" . $_GET['id'] ."'>Delete</a> </td>";
            echo "</tr>";

        }
        
        if(isset($_GET['delete'])){
            $delete_comment_id = $_GET['delete'];
            $query = "DELETE FROM comments WHERE comment_id = {$delete_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        }
        if(isset($_GET['unapproved'])){
            $unapprove_comment_id = $_GET['unapproved'];
            $query = "UPDATE comments SET comment_status ='unapproved' WHERE comment_id = {$unapprove_comment_id}";
            $unapprove_comment_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        } 
        if(isset($_GET['approved'])){
            $approve_comment_id = $_GET['approved'];
            $query = "UPDATE comments SET comment_status ='approved' WHERE comment_id = {$approve_comment_id}";
            $unapprove_comment_query = mysqli_query($connection, $query);
            header("Location: post_comments.php?id=" . $_GET['id'] . "");
        }
        ?>
    </tbody>
</table>

 </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        
<!-- /footer -->
<?php include "./includes/admin_footer.php" ?>