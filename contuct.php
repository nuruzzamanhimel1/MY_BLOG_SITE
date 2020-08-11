<?php include("inc/header.php");  ?>
<style type="text/css">
    input[type="text"]{
        font-size:18px;
    }
</style>
<?php 
            if($_SERVER['REQUEST_METHOD'] == "POST" AND isset($_POST['submit']))
            {
                $firstName = $fm->validation($_POST["firstName"]);
                $lastname = $fm->validation($_POST["lastname"]);
                $email = $fm->validation($_POST["email"]);
                $body = $fm->validation($_POST["body"]);

                $firstName = mysqli_real_escape_string($db->conn,$firstName);
                $lastname = mysqli_real_escape_string($db->conn,$lastname);
                $email = mysqli_real_escape_string($db->conn,$email);
                $body = mysqli_real_escape_string($db->conn,$body);

                $error = "";
                $mess = "";
                if(empty($firstName))
                {
                    $error = "Firstname Can't Empty.";
                }
                else if(empty($lastname))
                {
                    $error = "Lastname Can't Empty.";
                }
                else if(empty($email))
                {
                    $error = "Lastname Can't Empty.";
                }
                else if(filter_var($email,FILTER_VALIDATE_EMAIL) === FALSE)
                {
                    $error = "Invalid Email Address";
                }
                 else if(empty($body))
                {
                    $error = "Text Field Can't Empty.";
                }
                else{
                     $query = "INSERT INTO tbl_contuct(firstName,lastname,email,body) VALUES('$firstName','$lastname','$email','$body')";
                    $result = $db->insert($query);
                    if($result)
                    {
                    $mess = "Message Send Successfully ";
                    }else
                    {
                     $mess = "Fail To Send Message!! ";
                    }
                }
            }
?>
        <div class="contentSection contemplate clear">
            <div class="mainContent clear">
                <div class="about">
                    <h2> Contuct Us</h2>
                    <?php 
                        if(isset($error))
                        {
                            echo "<span><p style='color:red; font-size:20px;'>$error</p> </span>";
                        } if(isset($mess))
                        {
                            echo "<span><p style='color:green; font-size:20px;'>$mess</p> </span>";
                           
                        }
                    ?>
                    <form action="" method="post">
                        <table>
                        <tr>
                            <td>Your First Name</td>
                            <td><input type="text" name="firstName" placeholder="Enter first name"> </td>
                        </tr>
                        <tr>
                            <td>Your Last Name</td>
                            <td><input type="text" name="lastname" placeholder="Enter last name"> </td>
                        </tr>
                        <tr>
                            <td>Your Email Address</td>
                            <td><input type="text" name="email" placeholder="Enter emil address"> </td>
                            
                        </tr>
                        <tr>
                            <td>Your Address</td>
                            <td>
                                <textarea name="body"> </textarea>
                            </td>
                            
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="Send"> </td>
                        </tr>
                    </table>
                    </form>
                </div>
                
                
                
                
            </div>
            
            <?php include("inc/sidebar.php");  ?>
    <?php include("inc/footer.php");  ?>
