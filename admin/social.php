<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">     
          <?php 
            if(isset($_POST['update']) || $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $fb =$fm->validation($_POST['fb']);
                $tw =$fm->validation($_POST['tw']);
                $li =$fm->validation($_POST['li']);
                $gp =$fm->validation($_POST['gp']);

                $fb = mysqli_real_escape_string($db->conn,$fb);
                $tw = mysqli_real_escape_string($db->conn,$tw);
                $li = mysqli_real_escape_string($db->conn,$li);
                $gp = mysqli_real_escape_string($db->conn,$gp);

                if(empty($fb ) || empty($tw ) || empty($li )|| empty($gp ) )
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else{
                     $query = " 
                                UPDATE tbl_social SET 
                                fb = '$fb',
                                tw = '$tw',
                                li = '$li',
                                gp = '$gp'
                                WHERE id = '1' 
                            ";

                        $result1 = $db->update($query);
                        if(isset($result1))
                        {
                        echo "<span><p class='success'>Update Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Update!! </p> </span>";
                        }
                }
            }

          ?>


        <?php 
            $query = "SELECT * FROM tbl_social WHERE id = 1";
            //query perform...........
            $result = $db->select($query);
            if($result)
            {   // user return data......
                // while($value = $result->fetch_assoc())
                while ($value = mysqli_fetch_array($result)) 
                {
              
        ?>            
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $value['fb']; ?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $value['tw']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="li" value="<?php echo $value['li']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value="<?php echo $value['gp']; ?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php 
                    }
                }
                ?>
                </div>
            </div>
        </div>
       <?php include("inc/footer.php") ?>