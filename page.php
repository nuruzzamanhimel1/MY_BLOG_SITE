<?php include("inc/header.php");  ?>
<?php 
    if(!isset($_GET['pageId']) || $_GET['pageId'] == NULL)
    {
        header("Location: 404.php");
    }else{
        $pageId = $_GET['pageId'];
    }
?>
<div class="contentSection contemplate clear">
    <div class="mainContent clear">
    <?php 
       $query = "SELECT * FROM tbl_pages WHERE id= ".$pageId;
       $pageRes = $db->select($query);
       if($pageRes)
       {
           $result = $pageRes->fetch_assoc();
           
    ?>
        <div class="about">
            <h2> <?php echo $result['name']; ?></h2>
            
           <?php echo $result['body']; ?>
        </div>
    <?php }  
            
        else{
            header("Location: 404.php");
        }
    ?> 
    </div>
    
    <?php include("inc/sidebar.php");  ?>
    <?php include("inc/footer.php");  ?>
