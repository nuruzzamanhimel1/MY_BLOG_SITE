<?php include("config/config.php"); ?>
<?php include("lib/Database.php");  ?>
<?php include("helper/format.php");  ?>

<?php 
    $db = new Database();
    $fm = new format();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--  meta keyword and description....................... -->
<?php  include("script/meta.php");?>
<!--  meta keyword and description....................... -->
   <!--  // tut 30...............................
    //  Dynamic title handling....................... -->  
<?php  include("script/title.php");?>
 <!-- // tut 30............................... -->
<?php   include("script/css.php"); ?>	
	
	<script src="js/ajax.googleapis.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider({
			effect:'random',
			slices:10,
			animSpeed:6000,
			pauseTime:5000,
			startSlide:0, //Set starting Slide (0 index)
			directionNav:false,
			directionNavHide:false, //Only show on hover
			controlNav:false, //1,2,3...
			controlNavThumbs:false, //Use thumbnails for Control Nav
			pauseOnHover:true, //Stop animation while hovering
			manualAdvance:false, //Force manual transitions
			captionOpacity:0.8, //Universal caption opacity
			beforeChange: function(){},
			afterChange: function(){},
			slideshowEnd: function(){} //Triggers after all slides have been shown
		});
	});
	</script>
</head>

<body>
	<div class="headerSection template clear">
    	<div class="logo"> 
     <?php 
            $query = "SELECT * FROM title_slogan WHERE id = 1";
            $rsltHeader = $db->select($query);
            while ($value = mysqli_fetch_array($rsltHeader)) 
            {
              
        ?> 
        	<img src="admin/uploads/logo/<?php echo $value['logo']; ?>" alt="logo image" >
            <h2><?php echo $value['title']; ?></h2>
            <p> <?php echo $value['des']; ?></p>
    <?php } ?>
        </div>
        <div class="social">
            <?php 
            $query = "SELECT * FROM tbl_social WHERE id = 1";
            $result = $db->select($query);
            if($result)
            { 
                while ($value = mysqli_fetch_array($result)) 
                { 
        ?>   
            <a href="<?php echo $value['fb']; ?>"><img src="social/socalicon/fb.png" alt="FB" ></a>
            <a href="<?php echo $value['tw']; ?>"><img src="social/socalicon/ggl.png" alt="tw" ></a>
            <a href="<?php echo $value['li']; ?>"></a><img src="social/socalicon/likin.png" alt="li" >
        	<a href="<?php echo $value['gp']; ?>"></a><img src="social/socalicon/twtr.png" alt="gp" >
            <?php 
                }
            }
            ?>
         </div>
         <div class="searchbtn clear">
            <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search keyword..."/>
                <input type="submit" name="submit" value="Search"/>
            </form>
            </div>
    </div>
    <div class="nevigationSection template">
        <?php 
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currentPage =basename($path,".php");
        ?>
            <ul>
                <li><a <?php if($currentPage == "index"){echo 'id="active"';}  ?> href="index.php"> Home</a></li>
                 <?php 
                $query = "SELECT * FROM tbl_pages ";
                $result = $db->select($query);
                if($result)
                {
                    while ($value = mysqli_fetch_array($result)) 
                    {
                  
            ?>  
                    <li><a  
                    <?php 
                        if(isset($_GET['pageId']) && $_GET['pageId'] == $value['id'])
                        {
                            echo 'id="active"';
                        }
                    ?>

                        href="page.php?pageId=<?php echo $value['id'];  ?>"> <?php echo $value['name'];  ?></a></li>
            <?php } } ?>
                <li><a <?php if($currentPage == "about"){echo 'id="active"';}  ?>  href="about.php"> About</a></li>
                <li><a <?php if($currentPage == "contuct"){echo 'id="active"';}  ?>  href="contuct.php"> Content</a>
                </li>
            </ul>
        </div>