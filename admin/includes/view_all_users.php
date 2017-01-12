<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php 
         $query = "SELECT * FROM users ";
        $select_users = mysqli_query($connection, $query);     
        while($row = mysqli_fetch_assoc($select_users)) {
            $user_id = escape($row['user_id']);
            $user_name = escape($row['user_name']);
            $user_firstname = escape($row['user_firstname']);
            $user_lastname = escape($row['user_lastname']);
            $user_email = escape($row['user_email']);
            $user_role = escape($row['user_role']);
           
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name }</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>$user_role</td>";
            echo "<td>Now</td>";

            $query = "SELECT * FROM users WHERE user_id = $user_id ";
            $select_user_id_query = mysqli_query($connection, $query);
//            while($row = mysqli_fetch_assoc($select_user_id_query)){
//                $user_id = $row['user_id'];
//                $user_name = $row['user_name'];
//                echo "<td><a href='../post.php?p_id=$user_id'>$user_name</a></td>";
//            }
            
            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a> </td>";
            echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a> </td>";
            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a> </td>";
            echo "<td><a onClick=\" javascript: return confirm('Are you sure you want to delete?');\" href='users.php?delete={$user_id}'>Delete</a> </td>";
            echo "</tr>";

        }
        
        if(isset($_GET['delete'])){
            if(isset($_SESSION['user_role'])){
                if($_SESSION['user_role'] == 'admin') {
                    $delete_user_id = $_GET['delete'];
                    $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: users.php");

                }
            }
        }
        if(isset($_GET['change_to_admin'])){
            $user_id_admin = escape($_GET['change_to_admin']);
            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = {$user_id_admin}";
            $user_role_admin_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }
        if(isset($_GET['change_to_sub'])){
            $user_id_sub = escape($_GET['change_to_sub']);
            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$user_id_sub}";
            $user_role_sub_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }
        if(isset($_GET['edit'])){
            $edit_user_id = escape($_GET['edit']);
            $query = "UPDATE users WHERE user_id = {$edit_user_id}";
            $unapprove_comment_query = mysqli_query($connection, $query);
            header("Location: users.php");
        }
        ?>
    </tbody>
</table>