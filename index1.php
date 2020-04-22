<?php include "includes/db.php"; ?>
   
<?php
   
   include "includes/header1.php";

?>

    <!-- Navigation -->
<?php

   include "includes/navigation1.php"; 

?>
   
    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
                
                
                <?php
                
                   $query = "SELECT * FROM posts";
                   $select_all_posts_query = mysqli_query($connection, $query);
                    
                    
                   while($row = mysqli_fetch_assoc($select_all_posts_query)){
                       $post_id = $row['post_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date = $row['post_date']; 
                       $post_image = $row['post_image']; 
                       $post_content = substr($row['post_content'], 0, 10000);
                       $post_status = $row['post_status'];
                       
                       if($post_status !== 'published'){
                           echo "<h1 class='text-center'> NO POST HERE </h1>";
                       }else{
                           
                       
                ?>      
                   
                 
                      
                   <h1 class="page-header">
                    <a href="#"><?php echo $post_title ?></a>
                   </h1>
 
                <!-- First Blog Post -->
                   <p class="lead">
                    od <a href="index.php"><?php echo $post_author ?></a>
                   </p>
                   
                   <?php
        
                     $post_category_id = $row['post_category_id']; 
                     $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                    $select_categories_id = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_categories_id)){   
                    $cat_title_cg = $row['cat_title_cg'];
                    ?>
                   <p>Kategorija : <?php echo $cat_title_cg ?></p>
                   <?php }   ?>
                   
                   <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                   <hr>
                   <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                   <hr>
                   <p><?php echo $post_content ?></p>
                   <a class="btn btn-primary" href="post1.php?p_id=<?php echo $post_id; ?>">Citaj vise <span class="glyphicon glyphicon-chevron-right"></span></a>

                   <hr>

                   
             <?php      
                   
                     } 
                    
                  }
               
                       
                   
             ?>

           
                

            </div>

            
            
            <?php
            
              include "includes/sidebar1.php";
            
            ?>
            
            
        </div>
        

        <hr>


<?php
  
   include "includes/footer1.php";        
  
?>