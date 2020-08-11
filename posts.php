<?php include("inc/header.php");  ?>

<?php 
	if(!isset($_GET['catId']) || empty($_GET['catId']))
	{
		header("Location: 404.php");
	}
	else{
		$catId = $_GET['catId'];
	}
?>
<div class="contentSection contemplate clear"> 
    	<div class="mainContent clear">
<?php  
    $query = "SELECT * FROM tbl_post WHERE catId= ".$catId;
    //echo $query;
    $catagory = $db->select($query);
   
   if($catagory)
   {        //while($value = mysqli_fetch_assoc($catagory))
            while($value = $catagory->fetch_assoc())
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
     <?php } else{
        header("Location: 404.php");
    }
        ?>  
 </div>
 <?php include("inc/sidebar.php");  ?>
 <?php include("inc/footer.php");  ?>