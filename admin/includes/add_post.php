<?php

if (isset($_POST['create_post'])) {

    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_author = $_SESSION['username'];
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    $post_tags = $_POST['post_tags'];
    $post_comment_count = 0;
    $post_date = date('d-m-y');
    $post_status = $_POST['post_status'];
    $author_id = $_SESSION['user_id'];
    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id,post_title,post_author,author_id,post_date,post_image,post_content,post_tags,post_status) VALUES({$post_category_id},'{$post_title}','{$post_author}','{$author_id}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";
    $add = mysqli_query($connection, $query);


    confirm($add);
    $view_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success'>Post Created..<a href='../post.php?p_id={$view_post_id}'>View Post</a> or<a href='posts.php?source=add_post'>Edit More Posts</a></p>";
}







?>





<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <select name="post_category" id="">
            <?php

            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            //               confirm($select_categories);
            while ($row = mysqli_fetch_assoc($select_categories)) {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>{$cat_title}</option>";
            }


            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $_SESSION['username']; ?>" disabled >
    </div>


    <div class="form-group">
        <select name="post_status" id="">

            <option value="draft">Post Status</option>
            <option value="draft">Draft</option>
            <option value="published">Publish</option>

        </select>
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="textarea" cols="50" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>




</form>