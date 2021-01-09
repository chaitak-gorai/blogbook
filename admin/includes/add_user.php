
    
                   <?php

if(isset($_POST['create_user'])){
    
             
             $user_firstname=$_POST['user_firstname'];
             $user_lasttname=$_POST['user_lastname'];
             $user_role=$_POST['user_role'];
//             $post_image=$_FILES['image']['name'];
//             $post_image_temp=$_FILES['image']['tmp_name'];
             $username=$_POST['username'];
             $user_email=$_POST['user_email'];
             $user_password=$_POST['user_password'];
//             $post_comment_count=4;
//             $post_date=date('d-m-y');
//             $post_status=$_POST['post_status'];

//    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query="INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) VALUES('{$user_firstname}','{$user_lasttname}','{$user_role}','{$username}','{$user_email}','{$user_password}')";
 $add_user=mysqli_query($connection,$query);   

    
//  confirm($add);


echo "User Created: "." "."<a href='users.php'> View users</a>" ;




}







?>
    

    
    
        
    <form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
     <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
<select name="user_role" id="">
   <option value="subscriber">Select option</option>
    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
</select>
<!--
    <div class="form-group">
     <select name="post_category" id="">
        <?php
            
              $query="SELECT * FROM users" ;                   $select_categories=mysqli_query($connection,$query);  
               

                    while($row=mysqli_fetch_assoc($select_categories)){
                       
                        $cat_id=$row['cat_id'];
                         $cat_title=$row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                    
                    
                    }
                         
            
            ?>
        </select>
    </div>
-->

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>



   

<!--
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
-->


    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" name="user_password" >
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>




</form>





