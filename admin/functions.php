<?php
function confirm($result){
      global $connection;
    if(!$result){
        
        die("query failed".mysqli_error($connection));
    }

    
    
}
function insert_categories(){
    global $connection;
       if(isset($_POST['submit'])){

                                $cat_title=$_POST['cat_title'];

                               if($cat_title== ""||empty($cat_title)){
                                   echo "This field should not be empty";
                               } else{
                                   $query="INSERT INTO categories(cat_title)";
                                   $query.="VALUE('{$cat_title}')";

                                   $create_category_query=mysqli_query($connection,$query);
                                   if(!$create_category_query){
                                       die('QUERY FAILEd'.mysqli_error($connection));
                                   }
                               }  

                              }



}


function find_categories(){
    global $connection;
    $query="SELECT * FROM categories ";
                            $select_categories=mysqli_query($connection,$query);   
                            while($row=mysqli_fetch_assoc($select_categories)){
                               global $cat_id;
                                $cat_id=$row['cat_id'];
                                 $cat_title=$row['cat_title'];
                                echo "<tr>";
                                echo "<td>{$cat_id}</td>";
                                echo "<td>{$cat_title}</td>"; 
                                
                              $user_role =$_SESSION['user_role'];
                               
            if($user_role=='admin'){  
                                echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                                echo "<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
                                 echo "</tr>";}else{
                
                 echo "<td>delete</td>";
                                echo "<td>edit</td>";
                                 echo "</tr>";
            }
}
}

function delete_categories(){
    global $connection;
      if(isset($_GET['delete'])){
                                  
                                $id_delete=$_GET['delete'];
                                  $query="DELETE FROM categories WHERE cat_id={$id_delete}";
                                  $delete_query=mysqli_query($connection,$query);
                                  header("location:categories.php");
                              }      
                                    
    
    
    
    
    
}









?>