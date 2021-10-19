
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
                                   <td class='emailjs'>{$user_firstname}</td>";
                                   
                                   
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
                                   
                                   <td ><a href='users.php?change2admin={$user_id}' class='emailjs'>Admin</a> </td>
                                    <td ><a href='users.php?change2sub={$user_id}' class='emailjs'>Subscriber</a> </td>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
<script type="text/javascript">
(function() {
emailjs.init("user_I6EygmjyHE3cr6faWnUR9");
})();
</script>

<script type='text/javascript'>
    document.querySelectorAll('.emailjs').forEach(el=>{
        el.addEventListener('click', function(event){
  
        var row=event.target.parentNode.parentNode;
  var data=row.querySelectorAll('td');
  console.log(row);
  const username=data[1].textContent;
  const user=data[2].textContent;  
  const user_email=data[4].textContent;
  const user_role=el.textContent;



  var templateParams = {
user: user,
username: username,
user_email: user_email,
user_role: user_role
};
 
emailjs.send('service_ahstaa2', 'template_gasl2ir', templateParams)
    .then(function(response) {
       console.log('SUCCESS!');
    }, function(error) {
       console.log('FAILED...');
    });

    })});
</script>