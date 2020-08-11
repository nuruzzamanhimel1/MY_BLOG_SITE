<?php include("inc/header.php");  ?>
<?php include("inc/slider.php");  ?>



  
     
    <div class="contentSection contemplate clear"> 
    	<div class="mainContent clear">
<!-- pegination start part-1 ...... -->
<?php 
    $per_page = 3;
   if(isset($_GET['page']))
   {
        $page = $_GET['page'];
   }else{
    $page = 1;
   }
   $start_form = ($page - 1) * $per_page;
?>
<!-- pegination End part-1 ...... -->
<?php  
    $query = "SELECT * FROM tbl_post  LIMIT $start_form, $per_page ";
    $result = $db->select($query);
   
   if($result)
   {
            while($value = $result->fetch_assoc())
            {
?>
         	<div class="samePost clear">
            	<h2>
                    <a href="post.php?id=<?php echo $value["id"] ?>">
                        <?php echo $value["title"] ?>              
                    </a> 
                </h2>
                <h4><?php echo $fm->formatDate($value["date"]); ?> <a href="#"><?php echo $value["author"] ?></a></h4>
                <img src="admin/uploads/<?php echo $value["image"] ?>" alt="post image">	
                <p>
                    <?php echo $fm->textShort($value["body"],400); ?>
                 </p>
                 <div class="readMore clear">
                    <a href="post.php?id=<?php echo $value["id"] ?>"> Read More</a> 
                </div>
            
            </div>
           
     <?php } ?> <!-- while loop end........ -->

    <!-- pegination start part-2...... -->
    <?php 
          $query = "SELECT * FROM tbl_post  ";
          $result = $db->select($query);
          $total_row = mysqli_num_rows($result);
          $total_page = ceil($total_row/$per_page);
    ?>
    <?php 
        echo "<span class='pegination'><a href='index.php?page=1'>First Page </a> ";
    ?>
    <?php 
        for ($i=1; $i <= $total_page; $i++) { 
    ?>
        <a   href="index.php?page=<?php echo $i; ?>"    > 
            <?php echo $i; ?>
        </a>
           
    <?php
        }
    ?>
        
    <?php 
        echo "<a href='index.php?page=".$total_page." '>Last Page </a> </span>";
    ?>
    <!-- pegination End part-2 ...... -->
    <?php } else{
        header("Location: 404.php");
    }
        ?>    
        </div>
        
      
    
    <?php include("inc/sidebar.php");  ?>
    <?php include("inc/footer.php");  ?>

