<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['viewId']) || $_GET['viewId'] == NULL)
    {
        header("Location: userlist.php");
    }else{
        $id = $_GET['viewId'];
    }
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                header("Location: userlist.php");
            }
            ?>

            <form action="" method="post" >

                <table class="form">
            <?php 
            
                $query = "SELECT * FROM  tbl_user WHERE id = '$id' " ;
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
                            <input type="text" readonly="readonly" value="<?php echo $result['name'] ?>"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Username</label>
                        </td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['username'] ?>"  class="medium" />
                        </td>
                    </tr>
                    
                     <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['email'] ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Destails</label>
                        </td>
                        <td>
                            <textarea readonly="readonly"  rows="15" cols="63">
                                <?php echo $result['des'] ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Back" />
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