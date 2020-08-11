<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['set']))
                    {   
                        $theme = $fm->validation($_POST['theme']);  
                        $theme = mysqli_real_escape_string($db->conn,$theme);

                        if($theme){
                            $query = "UPDATE tbl_theme SET theme = '$theme' WHERE id = '1' ";
                            $updttheme = $db->update($query);
                            if($updttheme)
                            {
                                echo "<span><p class='success'>Theme Update Successfully </p> </span>";
                            }else{
                                echo "<span><p class='error'>Fail To Theme Update !! </p> </span>";
                            }
                        }
                    }
                ?>
                <?php 
                    $query = "SELECT * FROM tbl_theme WHERE id = '1' ";
                    $result = $db->select($query);
                    //query validation...
                    if($result)
                    {
                        while ($value = mysqli_fetch_assoc($result)) {
                ?>

               
                 <form action="" method="post">
                    <table class="form">					
                        <tr> 
                            <td>
                                 <input type="radio" name="theme" value="default"
                    <?php if($value['theme'] == "default"){echo "checked";}?> > Default
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                 <input type="radio" name="theme" value="green"  <?php if($value['theme'] == "green"){echo "checked";}?>> Green
                            </td>
                        </tr>
                        <tr> 
                            <td>
                                 <input type="radio" name="theme" value="red"  <?php if($value['theme'] == "red"){echo "checked";}?>> Red
                            </td>
                        </tr>
                            <td>
                                <input type="submit" name="set" Value="SET" />
                            </td>
                        </tr>
                    </table>
                    </form>
                     <?php }  } ?>
                </div>
            </div>
        </div>
        <?php include("inc/footer.php") ?>