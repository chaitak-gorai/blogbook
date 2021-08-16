   <?php

if(isset($_POST['checkboxarray'])){
    
    
   foreach($_POST['checkboxarray'] as $checkvalue){
       
     $bulk_options=  $_POST['bulk_options'];
       
       switch($bulk_options){
               
           case 'published':
               
               $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$checkvalue}";
       
               $update_pub_query=mysqli_query($connection,$query);
           
               break;
           case 'draft': 
                     $query="UPDATE posts SET post_status='{$bulk_options}' WHERE post_id={$checkvalue}";
       
               $update_draft_query=mysqli_query($connection,$query);
               
                 break;
               
           case 'delete':
               $query="DELETE  FROM posts WHERE post_id={$checkvalue}";
                $delete_bulkpost_query=mysqli_query($connection,$query);
                break;
               
           case 'clone':
               $query="SELECT * FROM posts WHERE post_id='{$checkvalue}'";
               $select_post_query=mysqli_query($connection,$query);
             
               while($row=mysqli_fetch_array( $select_post_query)) {
                                 $post_id=$row['post_id'];
                                 $post_author=$row['post_author'];
                                 $post_title=$row['post_title'];
                                 $post_category_id=$row['post_category_id'];
                                 $post_image=$row['post_image'];
                                 $post_tags=$row['post_tags'];
                                 $post_comment_count=$row['post_comment_count'];
                                 $post_date=$row['post_date'];
                                 $post_status=$row['post_status'];
                                 $post_content=$row['post_content'];
                                 $author_id=$row['author_id'];
                   };
              $query="INSERT INTO posts(post_category_id,post_title,post_author,author_id,post_date,post_image,post_content,post_tags,post_status) VALUES({$post_category_id},'{$post_title}','{$post_author}','{$author_id}',now(),'{$post_image}','{$post_content}','{$post_tags}','draft')";
 $copy_query=mysqli_query($connection,$query);
               break;
       
       


       }



   }
}
?>
                   
                    
                    
                    
                    
                    
                    
                    <form method="post">
                     <table class="table table-bordered table-hover">
                         
                         <div class="optionscontainer col-xs-4">
                             <select class="form-control" name="bulk_options" id="">
                                 <option value="published">Select options</option>
                                 <option value="published">Publish</option>
                                 <option value="draft">Draft</option>
                                 <option value="delete">Delete</option>
                                 <option value="clone">Clone</option>
                                 
                                 
                                 
                                 
                             </select>
                             
                             
                             
                         </div>
                         
                       <div class="col-xs-6">
                          <?php $user_role =$_SESSION['user_role'];
                                 $user_id=$_SESSION['user_id'];
            if($user_role=='admin'){echo "<input type='submit' name='submit' class='btn btn-success' value='Apply'>";}else{echo"<input type='button' btn btn-danger value='Admin Access'";} ?>
                          
                           
                         <div>
                           <a href="posts.php?source=add_post" class="btn btn-primary">Add New Post</a>
                           
                    </div>
                         
                         </div>
                         
                         
                         
                         
                     </table>
                      
                      <table  class="table table-bordered table-hover">
                       <thead>
                           <tr>
                              <th><input id="allselectbox" type="checkbox"></th>
                               <th>ID</th>
                               <th>Author</th>
                               <th>Title</th>
                               <th>Category</th>
                               <th>Views</th>
                               <th>Image</th>
                               <th>Tags</th>
                               <th>Comments</th>
                               <th>Date</th>
                               <th>Status</th>
                               <th>View</th>
                               <th>Edit</th>
                               <th>Delete</th>
                           </tr>
                   
                           </thead>
                           <tbody>
<?php

 $query="SELECT * FROM posts ORDER BY post_id DESC";
                            $select_posts=mysqli_query($connection,$query);   
                            while($row=mysqli_fetch_assoc($select_posts)){
                               global $cat_id;
                                 $post_id=$row['post_id'];
                                 $post_author=$row['post_author'];
                                 $post_author_id=$row['author_id'];
                                 $post_title=$row['post_title'];
                                 $post_category_id=$row['post_category_id'];
                                 $post_image=$row['post_image'];
                                 $post_tags=$row['post_tags'];
                                 $post_comment_count=$row['post_comment_count'];
                                 $post_date=$row['post_date'];
                                 $post_status=$row['post_status'];
                                 $author_id=$row['author_id'];
                                 $post_views_count=$row['post_views_count'];
                                
                     
                                echo "<tr>
                            <td><input class='selectbox'' type='checkbox' name='checkboxarray[]' value='{$post_id}'></th>
                                 <td>{$post_id}</td>
                                   <td><a href='../user.php?u_id={$post_author_id}'>{$post_author}</a></td>
                                   <td>{$post_title}</td>";
                                   
                                   
                                          $query="SELECT * FROM categories WHERE cat_id={$post_category_id}" ;                   $select_categories_id=mysqli_query($connection,$query);   
                    while($row=mysqli_fetch_assoc($select_categories_id)){
                       
                        $cat_id=$row['cat_id'];
                         $cat_title=$row['cat_title'];
                        echo "<td>{$cat_title}</td>";}
                                echo " <td>{$post_views_count}</td>";
                                  echo" <td><img width='100' src='../images/$post_image'></td>
                                   <td>{$post_tags}</td>";
                                  
         $query ="SELECT * FROM comments WHERE comment_post_id=$post_id";
         $send_query=mysqli_query($connection,$query);
         $row=mysqli_fetch_array($send_query);
                                
        $comment_counts=mysqli_num_rows($send_query);
        echo "<td><a href='post_comments.php?id=$post_id'>{$comment_counts}</a></td>";
                                      
                                      
                             echo " <td>{$post_date} </td>
                                   <td>{$post_status} </td>
                                   <td><a href='../post.php?p_id={$post_id}'>View</a> </td>";
                                   
                                          
                             $user_role =$_SESSION['user_role'];
                                 $user_id=$_SESSION['user_id'];
            if($user_role=='admin'||$user_id==$author_id){    
                                      echo"
                                   <td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>
                                   <td><a href='posts.php?delete={$post_id}'>Delete</a> </td>";
            }else{
                
                echo"
                                   <td>Edit </td>
                                   <td>Delete </td>";
            }
                                   
                              
                            
                            
                            
                           echo" </tr>
                            
                            ";
                            
                            
                            
                            
                            
                            
                            
                            
                            }










?>
                                  
                                  
                                  
                                  
                                  
                                  
                                  
                              
                              
                           </tbody>
                           
                           
                           
                   </table>
                   
                  </form>
                 
                
               
              
             
            
           
          <?php

if(isset($_GET['delete'])){
$dpost_id=$_GET['delete'];
 $query="DELETE FROM posts WHERE post_id={$dpost_id}"  ;
    $delete_post_query=mysqli_query($connection,$query);
    header("location:posts.php");
}


?>