<?php 

	if(isset($_GET['p_id'])){
		$post_id = $_GET['p_id'];
		$query = "UPDATE posts WHERE post_id = $post_id SET post_views_count = 0 ";
		$reset_post_views_coutn = mysqli_query($connection, $query);
		confirm($reset_post_views_coutn);
		header("Location: posts.php");
	}
?>