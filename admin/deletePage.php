<?php 
    include("lib/Session.php");
    Session::sess_start();
    Session::getLogOut();
?>
<?php include("../config/config.php"); ?>
<?php include("../lib/Database.php");  ?>

<?php 
    $db = new Database();
   
   if(!isset($_GET['dltId']) || empty($_GET['dltId']))
   {
   	 echo "<script>window.location='index.php'  </script>";
   }
   else{
		   	$postId = $_GET['dltId'];

		   
		   	$query = "DELETE FROM tbl_pages WHERE id=".$postId;
		   	$result1 = $db->delete($query);
		   	if($result1)
		   	{
		   		echo "<script> alert('Successfully Page Deleted......') </script>";
		   		echo "<script>window.location='index.php'  </script>";
		   	}else{
		   		echo "<script> alert(' Fail To Delete Page !!!!......') </script>";
		   		echo "<script>window.location='index.php'  </script>";
		   	}
   }
?>