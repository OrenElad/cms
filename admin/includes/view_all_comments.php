<table class="table table-bordered table-hover">
    <thead>
        <tr>
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
         $query = "SELECT * FROM comments ";
        $select_comments = mysqli_query($connection, $query);     
        while($row = mysqli_fetch_assoc($select_comments)) {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_content = $row['comment_content'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];
           
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author }</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>comment status</td>";
            echo "<td>{$comment_date}</td>";
            echo "<td>In Response to</td>";
            echo "<td><a href='comments.php?source=edit_comment&p_id={$comment_id}'>Approve</a> </td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Unapprove</a> </td>";
            echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a> </td>";
            echo "</tr>";

//            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//            $select_categories_id = mysqli_query($connection, $query);     
//            while($row = mysqli_fetch_assoc($select_categories_id)) {
//                $cat_id = $row['cat_id'];
//                $cat_title = $row['cat_title'];
//                echo "<td>{$cat_title}</td>";
//            }
//            echo "<td>{$post_title}</td>";
//            echo "<td>{$post_author}</td>";
//            echo "<td>{$post_date}</td>";
//echo "<td><img width='100' src='../images/$post_image' alt='image'></td>";
//            echo "<td>{$post_content}</td>";
//            echo "<td>{$post_tags}</td>";
//            echo "<td>{$post_comment_count}</td>";
//            echo "<td>{$post_status}</td>";
//            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>";
//            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a> </td>";
//            echo "</tr>";
//
        }
        
        if(isset($_GET['delete'])){
            $delete_comment_id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id = {$delete_comment_id} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: comments.php");
        }
        ?>
    </tbody>
</table>