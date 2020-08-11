<?php 
	include("lib/Session.php");
	Session::sess_start();
?>
<?php include("../config/config.php"); ?>
<?php include("../lib/Database.php");  ?>
<?php include("../helper/format.php");  ?>

<?php 
    $db = new Database();
    $fm = new format();
?>

<?php 
 	Session::getLogIn();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['login']))
			{
				$username = $fm->validation($_POST["username"]);
				$password = $fm->validation(md5($_POST["password"]));

				$username = mysqli_real_escape_string($db->conn,$username);
				$password = mysqli_real_escape_string($db->conn,$password);

				$query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password' ";
				// echo $query;
				// exit();
				$result = $db->select($query);
				if($result)
				{
					//$value = mysqli_fetch_array($result); 
					$value = $result->fetch_assoc();

					//$row = mysqli_num_rows($result); 
					$row = $result->num_rows;
					if($row > 0)
					{
						Session::sess_set("login",TRUE);
						Session::sess_set("username",$value['username']);
						Session::sess_set("userId",$value['id']);
						Session::sess_set("userRole",$value['role']);
						header("Location: index.php");
					}else{
						echo "<span><p style='color:red; font-size:18px;'>Result Not Found !! </p> </span>";
					}
				}else{
					echo "<span><p style='color:red; font-size:18px;'>Username & password Not Match !! </p> </span>";
				}
			}
		?>
		
		<form action="" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forgot Password !</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Nuruzzaman himel</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>