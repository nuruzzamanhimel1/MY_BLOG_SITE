<?php 
    include("lib/Session.php");
    Session::sess_start();
    Session::getLogOut();
?>
<?php include("../config/config.php"); ?>
<?php include("../lib/Database.php");  ?>

<?php 
    $db = new Database();
   
   if(!isset($_GET['dltsliderId']) || empty($_GET['dltsliderId']))
   {
   	 echo "<script>window.location='sliderlist.php'  </script>";
   }
   else{
		   	$tbl_slider_id = $_GET['dltsliderId'];

		   	// first unlink.......................
		   	$query = " SELECT * FROM tbl_slider WHERE id=".$tbl_slider_id ;
	
		   	$result = $db->select($query);
		   	if($result)
		   	{
		   		$value = $result->fetch_assoc();
		   		$img = $value['image'];
		   		unlink("uploads/slider/".$img);
		   	}
		   	$query = "DELETE FROM tbl_slider WHERE id=".$tbl_slider_id;
		   	$result1 = $db->delete($query);
		   	if($result1)
		   	{
		   		echo "<script> alert('Successfully Deleted Slider......') </script>";
		   		echo "<script>window.location='sliderlist.php'  </script>";
		   	}else{
		   		echo "<script> alert(' Delete Fail to Slider !!!!......') </script>";
		   		echo "<script>window.location='sliderlist.php'  </script>";
		   	}
   }
?>