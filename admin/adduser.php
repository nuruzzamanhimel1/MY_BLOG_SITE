<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
if(!Session::sess_get("userRole") == 0)
    {
        header("Location: index.php");
        exit();
 } ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
                    {
                        $username = $fm->validation($_POST['username']);
                        $password = $fm->validation(md5($_POST['password']));
                        $email = $fm->validation($_POST['email']);
                        $role = $fm->validation($_POST['role']);
                        // SQL injection protect by mysqli_real_escape_string()
                        $username = mysqli_real_escape_string($db->conn,$username);
                        $password = mysqli_real_escape_string($db->conn,$password);
                        $email = mysqli_real_escape_string($db->conn,$email);
                        $role = mysqli_real_escape_string($db->conn,$role);

                        if(empty($username) || empty($password) || empty($role) || empty($email))
                        {
                            echo "<span><p class='error'>Field Can't Empty !!! </p> </span>";
                        }
                        else
                        {
                            $mailquery = "SELECT * FROM tbl_user WHERE email=  '$email' LIMIT 1 ";
                            $mailreslt = $db->select($mailquery); 
                            if($mailreslt != FALSE)
                            {
                                 echo "<span><p class='error'>Email Already Exists!!! </p> </span>";
                            }
                            else
                            {
                                $query = "INSERT INTO tbl_user(username,password,email,role) VALUES('$username','$password','$email','$role')";
                                $result = $db->insert($query);
                                if($result)
                                {
                                    echo "<span><p class='success'>User Create Successfully </p> </span>";
                                }else{
                                    echo "<span><p class='error'>Fail To User Create!! </p> </span>";
                                }
                            }
                        }
                        
                    }
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label> Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter Username..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label> Password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter Password..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label> Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label> Role</label>
                            </td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select Any Role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Author</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include("inc/footer.php") ?>