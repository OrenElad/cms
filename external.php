<?php 
function usersOnline(){

        if(isset($_GET['onlineusers'])) {

            global $connection;
            if(!$connection){
                session_start();
                include '../includes/db.php';
                $session = $_SESSION['user_name'];
                $time = time();
                $time_out_in_seconds = 30;
                $time_out = $time - $time_out_in_seconds;

                $query = "SELECT * FROM users_online WHERE session = '$session' ";
                $send_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($send_query);

                if($count == NULL){
                    mysqli_query($connection, "INSERT INTO users_online(session,online_time) VALUES('$session','$time') ");
                }else {
                    mysqli_query($connection, "UPDATE users_online SET  online_time = '$time' WHERE session = '$session' ");
                }

                $user_online = mysqli_query($connection, "SELECT * FROM users_online WHERE  online_time > '$time_out' ");
                echo $count_user = mysqli_num_rows($user_online);
            }
        }
}
?>