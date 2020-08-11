<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['catId']) || $_GET['catId'] == NULL)
    {
        header("Location: catlist.php");
    }else{
        $id = $_GET['catId'];
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update']))
                    {   $id = $_GET['catId'];
                        $name = $fm->validation($_POST['name']);
                        // SQL injection protect by mysqli_real_escape_string()
                        $name = mysqli_real_escape_string($db->conn,$name);

                        if(empty($name))
                        {
                            echo "<span><p class='error'>Field Can't Empty !!! </p> </span>";
                        }
                        else{
                            $query = "UPDATE tbl_catagory SET name = '$name' WHERE id =".$id;
                            // echo $query;
                            // exit;
                            $result = $db->update($query);
                            if(isset($result))
                            {
                                echo "<span><p class='success'>Update Catagory Successfully </p> </span>";
                            }else{
                                echo "<span><p class='error'>Fail To Update Catagory!! </p> </span>";
                            }
                        }
                    }
                ?>
                <?php 
                    $query = "SELECT * FROM tbl_catagory WHERE id = '$id' ";
                     // echo $query;
                     //        exit;
                    //query perform
                    $result = $db->select($query);
                    //query validation...
                    if($result && mysqli_affected_rows($db->conn) == 1)
                    {
                        //use return data
                    $value = $result->fetch_assoc();
                    // or $value = mysqli_fetch_assoc($result);
                }else{
                    //header("Location: catlist.php");
                }
                    
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $value['name'];  ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <?php include("inc/footer.php") ?>