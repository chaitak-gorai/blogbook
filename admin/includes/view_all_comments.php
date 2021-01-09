   <table class="table table-bordered table-hover">
       <thead>
           <tr>
               <th>ID</th>
               <th>Author</th>
               <th>Comment</th>
               <th>Email</th>
               <th>Status</th>
               <th>Date</th>
               <th>In response to</th>
               <th>Approve</th>
               <th>Unapprove</th>
               <th>Delete</th>
           </tr>

       </thead>
       <tbody>
           <?php

 $query="SELECT * FROM comments";
                            $select_comments=mysqli_query($connection,$query);   
                            while($row=mysqli_fetch_assoc($select_comments)){
                               global $cat_id;
                                 $comment_id=$row['comment_id'];
                                 $comment_post_id=$row['comment_post_id'];
                                 $comment_author=$row['comment_author'];
                                $comment_content=$row['comment_content'];
                                $comment_email=$row['comment_email'];
                                 $comment_date=$row['comment_date'];
                                 $comment_status=$row['comment_status'];
                                 
                                 
                      
                                echo "<tr>
                            
                                 <td>{$comment_id}</td>
                                   <td>{$comment_author}</td>
                                   <td>{$comment_content}</td>";
                                   
                                   
//                                          $query="SELECT * FROM categories WHERE cat_id={$post_category_id}" ;                   $select_categories_id=mysqli_query($connection,$query);   
//                    while($row=mysqli_fetch_assoc($select_categories_id)){
//                       
//                        $cat_id=$row['cat_id'];
//                         $cat_title=$row['cat_title'];
//                        echo "<td>{$cat_title}</td>";}
                                
                                  echo" 
                                   <td>{$comment_email}</td>
                                   <td>{$comment_status}</td>";
                              
                                
                                
                                   
                                   echo "<td>{$comment_date} </td>";
                                
                                $query="SELECT * FROM posts WHERE post_id=$comment_post_id ";
                                $select_post_id_query= mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($select_post_id_query)){
                                    $post_id=$row['post_id'];
                                    $post_title=$row['post_title'];
                                    $author_id=$row['author_id'];
                                   echo "<td><a href='../post.php?p_id=$post_id'>{$post_title }</a></td>";
                                }
                                   $user_role =$_SESSION['user_role'];
                                 $user_id=$_SESSION['user_id'];
            if($user_role=='admin'||$user_id==$author_id){    
                                   echo "
                                   
                                   <td><a href='comments.php?approve=$comment_id'>Approve</a> </td>
                                    <td><a href='comments.php?unapprove=$comment_id'>Unapprove</a> </td>
                                      
                                   <td><a href='comments.php?delete=$comment_id'>Delete</a> </td>";
            }else{
                
            echo "<td>Approve </td>
                                    <td>Unapprove </td>
                                      
                                   <td>Delete </td>";
            };
                                   
                              
                            
                            
                            
                           echo" </tr>
                            
                            ";
                            
                            
                            
                            
                            
                            
                            
                            
                            }










?>









       </tbody>



   </table>









   <?php
if(isset($_GET['unapprove'])){
$ua_comment_id=$_GET['unapprove'];
 $query="UPDATE comments SET comment_status='unapproved' WHERE comment_id=$ua_comment_id"  ;
    $unapprove_comment_query=mysqli_query($connection,$query);
    header("Location:comments.php"); 
}

    if(isset($_GET['approve'])){
$ua_comment_id=$_GET['approve'];
 $query="UPDATE comments SET comment_status='approved' WHERE comment_id=$ua_comment_id"  ;
    $approve_comment_query=mysqli_query($connection,$query);
    header("Location:comments.php");

    }


if(isset($_GET['delete'])){
$dcomment_id=$_GET['delete'];
 $query="DELETE FROM comments WHERE comment_id={$dcomment_id}"  ;
    $delete_comment_query=mysqli_query($connection,$query);
    header("Location:comments.php");
}



?>