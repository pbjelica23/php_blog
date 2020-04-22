<?php include "includes/db.php"; ?>
   
<?php
   
   include "includes/header1.php";

?>

    
<?php

   include "includes/navigation1.php"; 

?>
   
    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
                
                
                <?php
                
                
                
              
    
                   if(isset($_POST['submit'])){
                      $search = $_POST['search'];
                     
                      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                      $search_query = mysqli_query($connection, $query);//passing a query
                     
                     if(!$search_query){
                          die("QUERY FAILED" . mysqli_error($connection));//killing everything after it
                     }
                     
                     $count = mysqli_num_rows($search_query);
                     
                     if($count == 0){
                          echo "<h1> NO RESULT </h1>";
                     }else{
                         
                       
                    
                    
                          while($row = mysqli_fetch_assoc($search_query)){//it comes as an assoc array
                           
                           $post_title = $row['post_title'];
                           $post_author = $row['post_author']; 
                           $post_date = $row['post_date']; 
                           $post_image = $row['post_image']; 
                           $post_content = $row['post_content']; 
                       
                      ?>      
                   
                   

                      <!-- First Blog Post -->
                         <h2>
                           <a href="#"><?php echo $post_title ?></a>
                         </h2>
                         <p class="lead">
                      od <a href="index.php"><?php echo $post_author ?></a>
                         </p>
                         <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                         <hr>
                         <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                         <hr>
                         <p><?php echo $post_content ?></p>
                         <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Citaj vise <span class="glyphicon glyphicon-chevron-right"></span></a>

                         <hr>

                   
                         <?php      
                   
                         }
               
                         
                         }
                    
                       }
                         ?>
                
        
           
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php
            
              include "includes/sidebar1.php";
            
            ?>
            
            
        </div>
        <!-- /.row -->

        <hr>


<?php
  
   include "includes/footer.php";        
  
?>