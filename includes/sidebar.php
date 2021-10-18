<div class="col-md-4">





    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">


            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>
    
    <?php include "widget-login.php" ?>

    <!-- Blog Categories Well -->
    <?php

    $query = "SELECT DISTINCT categories.cat_id, categories.cat_title
    FROM categories
    INNER JOIN posts ON categories.cat_id=posts.post_category_id";
    $select_categories_sidebar = mysqli_query($connection, $query);
    ?>

    <div class="well " id="categories">

        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php



                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li   class='list-items'
                        data-aos='fade-left'
                        data-aos-delay='100'><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }

                    ?>

                </ul>
            </div>
            <!-- /.col-lg-6 -->

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>
</div>

     <!-- Top Authors widget -->               
<div>
<?php include "top-authors.php" ?>
</div>

<script src="https://unpkg.com/aos@2.3.0/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1200,
    })
</script>
