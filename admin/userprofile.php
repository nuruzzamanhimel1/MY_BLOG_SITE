<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
   $userId = Session::sess_get("userId");
    $userRole = Session::sess_get("userRole");
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $password = md5($_POST['password']);

                $name = mysqli_real_escape_string($db->conn,$_POST['name']);
                $username = mysqli_real_escape_string($db->conn,$_POST['username']);
                $password = mysqli_real_escape_string($db->conn,$password);
                $email = mysqli_real_escape_string($db->conn,$_POST['email']);
                $des = mysqli_real_escape_string($db->conn,$_POST['des']);

                if(empty($name ) || empty($username ) ||  empty($email ) || empty($des) )
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else{
                if(!empty($password))
                {
    
                    $query = " 
                        UPDATE tbl_user SET 
                        name = '$name',
                        username = '$username',
                        password = '$password',
                        email = '$email',
                        des = '$des'
                        WHERE id = '$userId' AND role = '$userRole'  ";
                    // echo $query;
                    // exit();

                    $result = $db->update($query);
                    if($result)
                    {
                    echo "<span><p class='success'>Post Update Successfully </p> </span>";
                    }else
                    {
                     echo "<span><p class='error'>Fail To Post Update!! </p> </span>";
                    }
                        
                }
                else
                {
                    $query = " 
                        UPDATE tbl_user SET 
                        name = '$name',
                        username = '$username',
                        
                        email = '$email',
                        des = '$des'
                        WHERE id = '$userId' AND role = '$userRole' 
                    ";
                    //     echo $query;
                    // exit();
                        $result = $db->update($query);
                        if($result)
                        {
                        echo "<span><p class='success'>Profile Update Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Profile Update!! </p> </span>";
                        }
                    }
                
            
               }
            }
            ?>

            <form action="" method="post" >

                <table class="form">
            <?php 
            
                $query = "SELECT * FROM  tbl_user WHERE id = ".$userId." AND role = ".$userRole." " ;
                $userRes = $db->select($query);
                if($userRes)
                {
                while($result = $userRes->fetch_assoc())
                {
            ?>
                    
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $result['name'] ?>"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $result['username'] ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Password</label>
                        </td>
                        <td>
                            <input type="password" name="password" value=""  class="medium" /> <span class='error'> ** Not require for every time!!</span>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $result['email'] ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Destails</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="des">
                                <?php echo $result['des'] ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                <?php } } ?>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include("inc/footer.php") ?>
<script type="text/javascript">
$(document).ready(function () {
setupTinyMCE();
setDatePicker('date-picker');
$('input[type="checkbox"]').fancybutton();
$('input[type="radio"]').fancybutton();
});
</script>