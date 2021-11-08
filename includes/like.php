<?php 
$like_query = "UPDATE posts SET post_likes_count=post_likes_count +1 WHERE post_id=$link_post_id";
$send_query2 = mysqli_query($connection, $like_query);

$query2 = "SELECT * FROM posts WHERE post_id=$link_post_id";
$like_post_query = mysqli_query($connection, $query2);