<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New SLider</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $title = mysqli_real_escape_string($db->conn,$_POST['title']);
                
                $permited = array('jpg','jpeg','png','gif');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if( empty($title ) || empty($filename ) )
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                elseif($filesize>3145728)
                {
                echo "<span><p class='error'>Photo Size is High !!</p> </span>";
                }
                elseif(in_array($extension , $permited) === FALSE)
                {
                echo "<span><p class='error'>You can upload only".implode(",",$permited)."</p> </span>";
                }
                else
                {
                // upload image in server
                    move_uploaded_file($tmp_name,"uploads/slider/".$uploade_image);

                    $query = "INSERT INTO tbl_slider(title,image) VALUES('$title','$uploade_image')";
                    $result = $db->insert($query);
                    if($result)
                    {
                    echo "<span><p class='success'>Slider Upload Successfully </p> </span>";
                    }else
                    {
                     echo "<span><p class='error'>Fail To Slider Upload!! </p> </span>";
                    }
                }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Add" />
                        </td>
                    </tr>
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