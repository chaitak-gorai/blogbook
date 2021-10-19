<div class="well">
    <h4>Top 3 Authors</h4>

    <?php
    // query for top 3 authors based on post view count
    $query = "SELECT u.user_id, u.username, u.user_image, u.user_info, SUM(p.post_views_count) as view_count
        FROM users u
        JOIN posts p
        ON u.user_id=p.author_id
        WHERE post_status='published'
        GROUP BY author_id
        ORDER BY view_count DESC LIMIT 3";

    $top_authors_query = mysqli_query($connection, $query) or die(mysqli_error($connection));

    // fetch all records
    $top_authors = mysqli_fetch_all($top_authors_query, MYSQLI_ASSOC);

    $counter = 0;
    foreach ($top_authors as $row) {
        $user_id = $row['user_id'];
        $author_username = $row['username'];
        $user_image = $row['user_image'];
        $user_info = $row['user_info'];
        $view_count = $row['view_count'];

        $counter++;

    ?>
        <div class="card-grid-space">
            <a class="card" href="../user.php?u_id=<?= $user_id; ?>" style="--bg-img: url('../user_images/<?= $user_image; ?>');margin:1.5rem;text-decoration:none;">
                <div>
                    <h1><?= $author_username; ?></h1>
                    <p><?= $user_info; ?></p>
                    <div class="date">
                        <h1><?= $counter; ?>.</h1>
                    </div>
                    <div class="tag">
                        <p>Totall page views: </p>
                    </div>
                    <div class="tags">
                        <div class="tag"><i class="glyphicon glyphicon-eye-open"></i> <?= $view_count; ?></div>
                    </div>
                </div>
            </a>
        </div>
    <?php  } ?>