<div class="well">
    <h4>Top Blog Posts</h4>

    <?php
    $query = "SELECT * FROM posts WHERE post_status='published'   ORDER BY post_views_count DESC LIMIT 3 ";
    $select_all_posts_query = mysqli_query($connection, $query);


    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_title = $row['post_title'];
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'], 0, 100);
        $post_status = $row['post_status'];
        $post_category_id = $row['post_category_id'];
        $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
        $select_categories_id = mysqli_query($connection, $query);
        $cat = mysqli_fetch_assoc($select_categories_id);
        $post_category = $cat['cat_title'];
        if ($post_status == 'published') {




    ?>



            <div class="card-grid-space">

                <a class="card" href="../post.php?p_id=<?php echo $post_id; ?>" style="--bg-img: url('../images/<?php echo $post_image; ?>'); 
    margin: 1.5rem;">
                    <div>
                        <h1><?php echo $post_title; ?></h1>
                        <p><?php echo $post_content; ?></p>
                        <div class="date"><?php echo $post_date; ?></div>
                        <div class="tags">
                            <div class="tag"><?php echo $post_category; ?></div>
                        </div>
                    </div>
                </a>
            </div>



    <?php  }
    } ?>