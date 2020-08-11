<?php include("inc/header.php");  ?>

<?php 
	if(!isset($_GET['search']) || empty($_GET['search']))
	{
		header("Location: 404.php");
	}
	else{
		$search = $_GET['search'];
	}
?>
<div class="contentSection contemplate clear"> 
    	<div class="mainContent clear">
<?php  
    $query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'  ";
    //echo $query;
    $serchRes = $db->select($query);
   
   if($serchRes)
   {
            while($value = $serchRes->fetch_assoc())
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
       ?>
             <div class="abouttt">
                <div class="notfound">
                    <p><span style="font-size: 130px !important;">SEARCH</span> Not Found</p>
                </div>
            </div>
       <?php 
    }
        ?>  
 </div>
 <?php include("inc/sidebar.php");  ?>
 <?php include("inc/footer.php");  ?>