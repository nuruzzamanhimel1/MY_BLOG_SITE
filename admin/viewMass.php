<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['viewId']) || $_GET['viewId'] == NULL)
    {
        header("Location: inbox.php");
    }else{
        $viewId = $_GET['viewId'];
    }
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>View Message</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                header("Location: inbox.php");
            }
            ?>
            <form action="" method="post">
                <table class="form">
                <?php 
                        $query = "SELECT * FROM tbl_contuct WHERE id='$viewId' ";
                        $msgg = $db->select($query); //Query Perform
                        if($msgg)
                        {   
                            
                            while($value = $msgg->fetch_assoc()) // user return data
                            {
                               
                        ?>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" readonly="readonly" name="name" value="<?php echo $value['firstname']." ".$value['lastname']; ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Email</label>
                        </td>
                        <td>
                            <input type="text"  readonly="readonly" name="email" value="<?php echo $value['email']; ?>"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Date</label>
                        </td>
                        <td>
                            <input type="text"  readonly="readonly" name="date" value="<?php echo $fm->formatDate($value['date']); ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea  readonly="readonly" name="body" rows="15" cols="63">
                                <?php echo trim($value['body']); ?>
                            </textarea>
                        </td>
                    </tr>     
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Back" />
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        else{
                            echo "<span ><p class='error'>Message Not Available !!! </p> </span>";
                        }
                        ?>
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