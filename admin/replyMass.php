<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['replyId']) || $_GET['replyId'] == NULL)
    {
        header("Location: inbox.php");
    }else{
        $replyId = $_GET['replyId'];
    }
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Send Message</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
               $to = $fm->validation($_POST['to']);
               $From = $fm->validation($_POST['From']);
               $sub = $fm->validation($_POST['sub']);
               $messg = $fm->validation($_POST['messg']);
                       
               $to = mysqli_real_escape_string($db->conn,$to);
               $From = mysqli_real_escape_string($db->conn,$From);
               $sub = mysqli_real_escape_string($db->conn,$sub);
               $messg = mysqli_real_escape_string($db->conn,$messg);
               
               $sndMail = mail($to,$sub,$messg,$From);
               if($sndMail)
                    {
                    echo "<span><p class='success'>Send Message Successfully </p> </span>";
                    }else
                    {
                     echo "<span><p class='error'>Fail To Send Message!! </p> </span>";
                    }
            }
            ?>
            <form action="" method="post">
                <table class="form">
                <?php 
                        $query = "SELECT * FROM tbl_contuct WHERE id='$replyId' ";
                        $msgg = $db->select($query); //Query Perform
                        if($msgg)
                        {   
                            
                            while($value = $msgg->fetch_assoc()) // user return data
                            {
                               
                        ?>
                   
                    <tr>
                        <td>
                            <label>To</label>
                        </td>
                        <td>
                            <input type="text"  readonly="readonly" name="to" value="<?php echo $value['email']; ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>From</label>
                        </td>
                        <td>
                            <input type="text"   name="From" placeholder="Please Enter Your Email"  class="medium" />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label>Subject</label>
                        </td>
                        <td>
                            <input type="text"   name="sub" placeholder="Please Enter Your Subject"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Message</label>
                        </td>
                        <td>
                            <textarea  class="tinymce" name="messg" rows="15" cols="63">
                               
                            </textarea>
                        </td>
                    </tr>     
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Send" />
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