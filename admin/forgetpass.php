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
			if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['mail']))
			{
				$email = $fm->validation($_POST["email"]);
				$email = mysqli_real_escape_string($db->conn,$email);
				if(empty($email))
                {
                    echo "<span><p style='color:red; font-size:20px;'>Field Can't Empty !!! </p> </span>";
                }
                 else if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
                {
                    echo "<span><p style='color:red; font-size:20px;'>Invalid Email Address !!! </p> </span>";
                }
                else{
                	 $mailquery = "SELECT * FROM tbl_user WHERE email=  '$email' LIMIT 1 ";
                      $mailreslt = $db->select($mailquery); 
	                    if($mailreslt != FALSE)
	                    {
	                         while ($values = $mailreslt->fetch_assoc()) {
	                         	$userId = $values['id'];
	                         	$username = $values['username'];
	                         }
	                         $text = substr($email,0,5);
	                         $rand = rand(50000,99999);
	                         $newpass = "$text$rand";
	                         $newpass = md5($newpass);
	                          $updatequery = "UPDATE tbl_user SET password = '$newpass' WHERE id =".$userId;
                            // echo $query;
                            // exit;
                            $result = $db->update($updatequery);
                            if($result != FALSE )
                            {
                            	$mail_to = '$email';
                            	$from = "nuruzzaman.himel147@gmail.com";
                            	$mail_subject = "Your Password";
                            	$mail_message = "Your Email:".$email." And Password: ".$newpass." Please visite site for login  ";

                            	 $encoding = "utf-8";
						     // Preferences for Subject field
							    $subject_preferences = array(
							        "input-charset" => $encoding,
							        "output-charset" => $encoding,
							        "line-length" => 76,
							        "line-break-chars" => "\r\n"
							    );

							    // Mail header
							    $header = "Content-type: text/html; charset=".$encoding." \r\n";
							    $header .= "From: ".$from." <".$from."> \r\n";
							    $header .= "MIME-Version: 1.0 \r\n";
							    $header .= "Content-Transfer-Encoding: 8bit \r\n";
							    $header .= "Date: ".date("r (T)")." \r\n";

							    // Send mail
    					$sendMail = mail($mail_to, $mail_subject, $mail_message, $header);
    						if($sendMail){
    							echo "<span><p style='color:green; font-size:20px;'>Mail Send Successfully. </p> </span>";
    						}else{
    							echo "<span><p style='color:red; font-size:20px;'>Mail Not Send !!! </p> </span>";
    						}

							    
                            }

	                    }
	                    else
	                    {
							echo "<span><p style='color:red; font-size:18px;'>Your Email is not exists !! </p> </span>";
						}
                }

				
			}
		?>
		<form action="" method="post">
			<h1>Password Recovery</h1>
			<div>
				<input type="text" placeholder="Enter valid email"  name="email"/>
			</div>
			
			<div>
				<input type="submit" name="mail" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login !</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Nuruzzaman himel</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>