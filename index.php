<?php include "includes/db.php"; ?>
   
<?php
   
   include "includes/header.php";

?>

    
<?php

   include "includes/navigation.php"; 

?>
   
    
    <div class="container">

        <div class="row">

            
            <div class="col-md-8">
                
                
                <?php
                
                   $query = "SELECT * FROM posts";
                   $select_all_posts_query = mysqli_query($connection, $query);//passing a query
                    
                    
                   while($row = mysqli_fetch_assoc($select_all_posts_query)){//it comes as an assoc array
                       $post_id = $row['post_id'];
                       $post_title = $row['post_title'];
                       $post_author = $row['post_author'];
                       $post_date = $row['post_date']; 
                       $post_image = $row['post_image']; 
                       $post_content = substr($row['post_content'], 0, 10000);//making size of content that can be seen
                       $post_status = $row['post_status'];
                       
                       if($post_status !== 'published'){
                           echo "<h1 class='text-center'> NO POST HERE </h1>";
                       }else{
                           
                       
                       
                ?>      
                   

                
                   <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                   </h2>
                   <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                   </p>
                   
                   <?php
        
                     $post_category_id = $row['post_category_id']; 
                     $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                    $select_categories_id = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_categories_id)){   
                    $cat_title = $row['cat_title'];
                    ?>
                   <p>Category : <?php echo $cat_title ?></p>
                   <?php }   ?>
                   
                   <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                   <hr>
                   <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                   <hr>
                   <p><?php echo $post_content ?></p>
                   <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                   <hr>

                   
             <?php      
                   
                     } 
                    
                  }
               
             ?>

           
                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            
            <?php
            
              include "includes/sidebar.php";
            
            ?>
            
            
        </div>
        <!-- /.row -->

        <hr>


<?php
  
   include "includes/footer.php";        
  
?>