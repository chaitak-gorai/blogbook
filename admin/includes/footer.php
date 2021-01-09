       $query="SELECT * FROM categories WHERE cat_id={$post_category_id}" ;                   $select_categories_id=mysqli_query($connection,$query);   
                    while($row=mysqli_fetch_assoc($select_categories_id)){
                       
                        $cat_id=$row['cat_id'];
                         $cat_title=$row['cat_title'];
                                