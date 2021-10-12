<div class="well">
    <h4>Top 3 Authors</h4>

    <?php
    $query = "SELECT * FROM posts WHERE post_status='published'";
    $select_all_posts_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
    
    $user_top_tier = array();
    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        if (isset($user_top_tier[(string) $row['author_id']])){
            $user_top_tier[(string) $row['author_id']] += (integer) $row['post_views_count'];
        }   
        else {
            $user_top_tier[(string) $row['author_id']] = (integer) $row['post_views_count'];
        }   
    }

    arsort($user_top_tier);
    $counter = 0;
    foreach($user_top_tier as $user_id => $view_count) {
        if ($counter == 3){
            break;
        }
        $counter++;
        $query = "SELECT * FROM users WHERE user_id='{$user_id}'";   
        $select_all_posts_query = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $row = mysqli_fetch_assoc($select_all_posts_query);
        $author_username = $row['username'];
        $user_image = $row['user_image'];
        $user_info = $row['user_info'];

        ?>
       <div class="card-grid-space">
       
            <a class="card" href="../user.php?u_id=<?php echo $user_id; ?>" style="--bg-img: url('../user_images/<?php echo $user_image; ?>');margin:1.5rem;text-decoration:none;">
                <div>
                    <h1><?php echo $author_username; ?></h1>
                    <p><?php echo $user_info; ?></p>
                    <div class="date"><h1><?php echo $counter; ?></h1></div>
                    <div class="tag"><p>Totall page views: </p></div>
                    <div class="tags">
                        <div class="tag"><i class="glyphicon glyphicon-eye-open"></i> <?php echo $view_count; ?></div>
                    </div>
                </div>
            </a>
        </div>
  <?php  } ?>