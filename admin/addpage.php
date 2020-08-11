<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New Page</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $name = mysqli_real_escape_string($db->conn,$_POST['name']);
                $body = mysqli_real_escape_string($db->conn,$_POST['body']);
                $mt = mysqli_real_escape_string($db->conn,$_POST['mt']);
                $md = mysqli_real_escape_string($db->conn,$_POST['md']);
                
                
                $permited = array('jpg','jpeg');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($name ) || empty($body ) || empty($mt ) || empty($md ) )
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else{
                if(!empty($filesize))
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
                    // upload image in server
                        move_uploaded_file($tmp_name,"uploads/".$uploade_image);

                        $query = "INSERT INTO tbl_pages(name,body,image,meta_tags,meta_des) VALUES('$name','$body','$uploade_image','$mt','$md')";
                        
                        $result = $db->insert($query);
                        if($result)
                        {
                        echo "<span><p class='success'>Add Page Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Add Page!! </p> </span>";
                        }
                    }
                }
                else{
                    $uploade_image = "No-image-available.jpg";
                     move_uploaded_file($tmp_name,"uploads/".$uploade_image);

                         $query = "INSERT INTO tbl_pages(name,body,image,meta_tags,meta_des) VALUES('$name','$body','$uploade_image','$mt','$md')";
                        
                        $result = $db->insert($query);
                        if($result)
                        {
                        echo "<span><p class='success'>Add Page Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Add Page!! </p> </span>";
                        }
                }
              }
            }
            ?>
            <?php 
            if(Session::sess_get("userRole") == '0' OR Session::sess_get("userRole") == '1')
                {
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>name</label>
                        </td>
                        <td>
                            <input type="text" name="name" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body"></textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <!-- <img src="uploads/07778272a5.jpg" alt="image" width="200px" height="180px;"><br> -->
                            <input type="file" name="image" />
                        </td>
                    </tr> 
                     <tr>
                        <td>
                            <label>Meta Tags</label>
                        </td>
                        <td>
                            <input type="text" name="mt" placeholder="Enter Meta tags" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td >
                            <label>Meta Description</label>
                        </td>
                        <td>
                            <textarea  name="md" rows="18" cols="85">
                                
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php }else{
                
                 echo "<span><p class='error'>Editor Not Permited to Add any pages. He or She  can only edit pages. </p> </span>";
            } ?>
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