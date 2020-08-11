<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['viewPostId']) || $_GET['viewPostId'] == NULL)
    {
        header("Location: postlist.php");
    }else{
        $viewPostId = $_GET['viewPostId'];
    }
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>View Post</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                
        header("Location: postlist.php");
               
            }
            ?>

            <form action="" method="post" >

                <table class="form">
            <?php 
                $query = "SELECT * FROM tbl_post WHERE id = ".$viewPostId ;
                $PostRes = $db->select($query);
                while($postvalue = $PostRes->fetch_assoc())
                {
            ?>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId" readonly>
                                <option>SELECT CATAGORY</option>
                                <?php
                                $query = "SELECT * FROM tbl_catagory ORDER BY id ";
                                $result = $db->select($query);
                                while($value = $result->fetch_assoc())
                                {
                                    
                                ?>
                                <option value="<?php echo $value['id'];  ?>" 
                                    <?php 
                                        if($postvalue['catId'] == $value['id'])
                                    {
                                        echo "selected";
                                    }
                                    ?>
                                    >

                                    <?php 
                                    
                                    echo $value['name']; 
                                     
                                    ?>
                                        
                                </option>
                                   
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo $postvalue['title'] ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea rows="15" cols="63" readonly="readonly">
                                <?php echo $postvalue['body'] ?>
                            </textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $postvalue['image'] ?>" width="150px" height="80px"><br>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" readonly value="<?php echo Session::sess_get('username');  ?>" class="medium" readonly />
                        </td>
                         
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $postvalue['tags'] ?>" class="medium" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Back" />
                        </td>
                    </tr>
                <?php } ?>
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