<?php
    include "db.php"; 

    if(isset($_GET["add_like"])) {
        $id = $_GET["p_id"];
        $array = $_POST;
        $found = false;

        foreach ($array as &$i) {
            if($id == $i) {
                $found = true;
            }
        }

        if ($found == false) {
            $like_query = "UPDATE posts SET post_likes_count=post_likes_count +1 WHERE post_id=".$_GET["p_id"];
            $send_query2 = mysqli_query($connection, $like_query);

            $query2 = "SELECT * FROM posts WHERE post_id=".$_GET["p_id"];
            $like_post_query = mysqli_query($connection, $query2);

            echo "true";
            return;
        }      
    }

    echo "false";    
?>