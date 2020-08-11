<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
                    {
                        $name = $fm->validation($_POST['name']);
                        // SQL injection protect by mysqli_real_escape_string()
                        $name = mysqli_real_escape_string($db->conn,$name);

                        if(empty($name))
                        {
                            echo "<span><p class='error'>Field Can't Empty !!! </p> </span>";
                        }
                        else{
                            $query = "INSERT INTO tbl_catagory(name) VALUES('$name')";
                            $result = $db->insert($query);
                            if(isset($result))
                            {
                                echo "<span><p class='success'>Insert Catagory Successfully </p> </span>";
                            }else{
                                echo "<span><p class='error'>Fail To insert Catagory!! </p> </span>";
                            }
                        }
                    }
                ?>
             <?php 
                    if(Session::sess_get("userRole") == '0' OR Session::sess_get("userRole") == '2')
                        {
            ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
               
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                
                    </table>
                    </form>
                <?php }else{
                    echo "<span><p class='error'>You have no any permision to Add catagory !! </p> </span>";
                } ?>
                </div>
            </div>
        </div>
        <?php include("inc/footer.php") ?>