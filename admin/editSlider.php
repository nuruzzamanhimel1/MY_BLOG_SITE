<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['edtsliderId']) || $_GET['edtsliderId'] == NULL)
    {
        header("Location: sliderlist.php");
    }else{
        $tbl_slider_id = $_GET['edtsliderId'];
    }
?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Edit Slider</h2>
        <div class="block">
            <?php
            if(isset($_POST['update']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                 $sliderId = mysqli_real_escape_string($db->conn,$_POST['sliderId']);
                $title = mysqli_real_escape_string($db->conn,$_POST['title']);
                
                $permited = array('jpg','jpeg','png','gif');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if( empty($title ))
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else{
                if(!empty($filename))
                {
                    if($filesize>3145728)
                    {
                    echo "<span><p class='error'>Photo Size is High !!</p> </span>";
                    }
                    elseif(in_array($extension , $permited) === FALSE)
                    {
                    echo "<span><p class='error'>You can upload only".implode(",",$permited)."</p> </span>";
                    }
                        else
                        {
                             $query = "SELECT * FROM tbl_slider WHERE id = ".$sliderId ;
                             $imgRes = $db->select($query);
                             if($imgRes)
                             {
                                $value = $imgRes->fetch_assoc();
                                $image = $value["image"];
                                unlink("uploads/slider/".$image); // deleete image from slider folder
                             }
                        // upload image in server
                            move_uploaded_file($tmp_name,"uploads/slider/".$uploade_image);

                            $query = " 
                                UPDATE tbl_slider SET 
                                title = '$title',
                                image = '$uploade_image'
                                WHERE id = $sliderId 
                            ";

                            $result = $db->update($query);
                            if($result)
                            {
                            echo "<span><p class='success'>Slider Update Successfully </p> </span>";
                            }else
                            {
                             echo "<span><p class='error'>Fail To Slider Update!! </p> </span>";
                            }
                        }
                }
                else{
                   $query = " 
                        UPDATE tbl_slider SET 
                        title = '$title'   
                        WHERE id = $sliderId 
                    ";

                        $result = $db->update($query);
                        if($result)
                        {
                        echo "<span><p class='success'>Slider Update Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Slider Update!! </p> </span>";
                        }
                    }
                
                }//....
               
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">

                <table class="form">
            <?php 
                $query = "SELECT * FROM tbl_slider WHERE id = ".$tbl_slider_id ;
                $showReslt = $db->select($query);// query perform
                while($showvalue = $showReslt->fetch_assoc())// mysqli_fetch_assoc($showReslt)
                {
            ?>
                    
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="hidden" name="sliderId" value="<?php echo $showvalue['id'] ?>"  class="medium" />
                            <input type="text" name="title" value="<?php echo $showvalue['title'] ?>"  class="medium" />
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/slider/<?php echo $showvalue['image'] ?>" width="150px" height="80px"><br>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    
                    
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="update" Value="Update" />
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