
         <table class="table table-bordered table-hover">
       <thead>
           <tr>
               <th>ID</th>
               <th>Username</th>
               <th>Firstname</th>
               <th>Lastname</th>
               <th>Email</th>
               <th>Role</th>
               <th colspan="4">Admin Excess Only</th>
<!--
               <th>Approve</th>
               <th>Unapprove</th>
               <th>Delete</th>
-->
           </tr>

       </thead>
       <tbody>
           <?php

 $query="SELECT * FROM users";
                            $select_users=mysqli_query($connection,$query);   
                            while($row=mysqli_fetch_assoc( $select_users)){
                               global $cat_id;
                                 $user_id=$row['user_id'];
                                 $username=$row['username'];
                                 $user_password=$row['user_password'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];
                                 $user_email=$row['user_email'];
                                 $user_image=$row['user_image'];
                                 $user_role=$row['user_role'];
                                 
                                 
                      
                                echo "<tr>
                            
                                 <td>{$user_id}</td>
                                   <td><a href='../user.php?u_id={$user_id}'>{$username}</a></td>
                                   <td>{$user_firstname}</td>";
                                   
                                   
//                                          $query="SELECT * FROM categories WHERE cat_id={$post_category_id}" ;                   $select_categories_id=mysqli_query($connection,$query);   
//                    while($row=mysqli_fetch_assoc($select_categories_id)){
//                       
//                        $cat_id=$row['cat_id'];
//                         $cat_title=$row['cat_title'];
//                        echo "<td>{$cat_title}</td>";}
                                
                                  echo" 
                                   <td>{$user_lastname}</td>
                                   <td>{$user_email}</td>";
                                 echo "<td>{$user_role} </td>";
                                
//                                $query="SELECT * FROM posts WHERE post_id=$comment_post_id ";
//                                $select_post_id_query= mysqli_query($connection,$query);
//                                while($row=mysqli_fetch_assoc($select_post_id_query)){
//                                    $post_id=$row['post_id'];
//                                    $post_title=$row['post_title'];
//                                    
//                                   echo "<td><a href='../post.php?p_id=$post_id'>{$post_title }</a></td>";
//                                }
//                                  
                                
                                
                             $user_role =$_SESSION['user_role'];
                               
            if($user_role=='admin'){                    
                                   echo "
                                   
                                   <td><a href='users.php?change2admin={$user_id}'>Admin</a> </td>
                                    <td><a href='users.php?change2sub={$user_id}'>Subscriber</a> </td>
                                       <td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a> </td>
                                   <td><a href='users.php?delete={$user_id}'>Delete</a> </td>";
                                   
                              }else{
                echo "<td>Admin</td>
                                    <td>Subscriber</td>
                                       <td>Edit </td>
                                   <td>Delete </td>";
                                   
                                 
            }
                            
                            
                            
                          echo " </tr>";
            }
                            
                            
                            
                            
                            
                            
                            
                            










?>









       </tbody>



   </table>









   <?php
if(isset($_GET['change2admin'])){
$auser_id=$_GET['change2admin'];
 $query="UPDATE users SET user_role='admin' WHERE user_id=$auser_id"  ;
    $change2admin_query=mysqli_query($connection,$query);
    header("Location:users.php"); 
}

    if(isset($_GET['change2sub'])){
$us_id=$_GET['change2sub'];
 $query="UPDATE users SET user_role='subscriber' WHERE user_id=$us_id"  ;
    $change2sub_query=mysqli_query($connection,$query);
    header("Location:users.php");

    }


if(isset($_GET['delete'])){
$duser_id=$_GET['delete'];
 $query="DELETE FROM users WHERE user_id={$duser_id}"  ;
    $delete_user_query=mysqli_query($connection,$query);
    header("Location:users.php");
}



?>