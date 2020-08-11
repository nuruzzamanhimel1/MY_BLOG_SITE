<?php 
    include("lib/Session.php");
    Session::sess_start();
    Session::getLogOut();
?>
<?php include("../config/config.php"); ?>
<?php include("../lib/Database.php");  ?>

<?php 
    $db = new Database();
   
   if(!isset($_GET['dltPostId']) || empty($_GET['dltPostId']))
   {
   	// echo "<script>window.location='postlist.php'  </script>";
   }
   else{
		   	$postId = $_GET['dltPostId'];

		   	// first unlink.......................
		   	$query = " SELECT * FROM tbl_post WHERE id=".$postId ;
		   	// echo $query;
		   	// exit();
		   	$result = $db->select($query);
		   	if($result)
		   	{
		   		$value = $result->fetch_assoc();
		   		$img = $value['image'];
		   		unlink("uploads/".$img);
		   	}
		   	$query = "DELETE FROM tbl_post WHERE id=".$postId;
		   	$result1 = $db->delete($query);
		   	if($result1)
		   	{
		   		echo "<script> alert('Successfully Deleted......') </script>";
		   		echo "<script>window.location='postlist.php'  </script>";
		   	}else{
		   		echo "<script> alert(' Delete Fail !!!!......') </script>";
		   		echo "<script>window.location='postlist.php'  </script>";
		   	}
   }
?>