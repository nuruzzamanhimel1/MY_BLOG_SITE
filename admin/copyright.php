<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
        <?php 
            if(isset($_POST['update']) || $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $copy =$fm->validation($_POST['copy']);
                
                $copy = mysqli_real_escape_string($db->conn,$copy);
               

                if(empty($copy ))
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else{
                     $query = " 
                                UPDATE tbl_copy SET 
                                copy = '$copy'
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
            $query = "SELECT * FROM tbl_copy WHERE id = 1";
           
            $result = $db->select($query);
            if($result)
            { 
                while ($value = mysqli_fetch_array($result)) 
                {
              
        ?>     
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $value['copy']; ?>" name="copy" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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