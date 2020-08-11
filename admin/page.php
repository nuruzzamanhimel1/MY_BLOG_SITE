<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['pageId']) || empty($_GET['pageId']))
    {
        header("Location: index.php");
    }
    else{
        $pageId = $_GET['pageId'];
    }
?>
<style type="text/css">
    .deletePg {
    margin-left: 20px;
}
    .deletePg a {
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 4px 12px;
    background: #F0F0F0;
    font-weight: normal;
}
</style>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">
            <?php
            if(isset($_POST['update']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $name = mysqli_real_escape_string($db->conn,$_POST['name']);
                $body = mysqli_real_escape_string($db->conn,$_POST['body']);
                
                
                $permited = array('jpg','jpeg');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];

                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($name ) || empty($body ) )
                {
                    echo "<span><p class='error'>Field Can't Empty !!</p> </span>";
                }
                else
                {
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
                            $query = "SELECT * FROM tbl_pages WHERE id = '$pageId' ";
                            $result1 = $db->select($query);
                            $value1 = $result1->fetch_assoc();
                            if($value1)
                            {
                               if($value1['image'] == "No-image-available.jpg" )
                                {
                                    // upload image in server
                                    move_uploaded_file($tmp_name,"uploads/".$uploade_image);
                                    
                                    $query = " 
                                            UPDATE tbl_pages SET 
                                            name = '$name',
                                            body = '$body',
                                            image = '$uploade_image'
                                            
                                            WHERE id = '$pageId' 
                                        ";
                                    $result = $db->update($query);
                                    // get notification.......
                                    if($result)
                                    {
                                        echo "<span><p class='success'>Update Page Successfully </p> </span>";
                                    }
                                    else
                                    {
                                        echo "<span><p class='error'>Fail To Update Page!! </p> </span>";
                                    }
                                    
                                } 
                                else{
                                    unlink("uploads/".$value1['image']);
                                    move_uploaded_file($tmp_name,"uploads/".$uploade_image);
                                    
                                    $query = " 
                                            UPDATE tbl_pages SET 
                                            name = '$name',
                                            body = '$body',
                                            image = '$uploade_image'
                                            
                                            WHERE id = '$pageId' 
                                        ";
                                    $result = $db->update($query);
                                    if($result)
                                    {
                                        echo "<span><p class='success'>Update Page Successfully </p> </span>";
                                    }
                                    else
                                    {
                                        echo "<span><p class='error'>Fail To Update Page!! </p> </span>";
                                    }
                                }
                            }
                            
                        
                        }
                    } // if1 end...............
                    else
                    {

                              $query = " 
                                    UPDATE tbl_pages SET 
                                    name = '$name',
                                    body = '$body'
                                    WHERE id = '$pageId' 
                                ";
                            
                            $result = $db->update($query);
                            // get notification.........
                            if($result)
                            {
                                echo "<span><p class='success'>Update Page Without img Successfully </p> </span>";
                            }
                            else
                            {
                                echo "<span><p class='error'>Fail To Update Page Without img!! </p> </span>";
                            }
                    } // else1 end....
                
                }
            }
            
            ?>
            <?php 
                $query = "SELECT * FROM tbl_pages WHERE id= '$pageId ' ";
                $result = $db->select($query);
                if($result)
                {
                    while ($value = mysqli_fetch_array($result)) 
                    {
                  
            ?>  
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>name</label>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $value['name'];  ?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Body</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $value['body'];  ?>
                            </textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <?php 
                                if($value['image'] == "No-image-available.jpg")
                                {
                            ?>

                            <img src="uploads/no img/No-image-available.jpg" alt="image" width="200px" height="180px;"><br>
                            <?php }
                            else{
                            ?>
                            <img src="uploads/<?php echo $value['image'];  ?>" alt="image" width="200px" height="180px;"><br>
                            <?php
                            } 
                            ?>
                            <input type="file" name="image" />
                        </td>
                    </tr> 
                 <?php 
            if(Session::sess_get("userId") == $value['userId']  OR Session::sess_get("userRole") == '0')
                {
            ?>
                    <tr>
                        <td></td>
                        <td style="padding-top: 19px;">
                            <input type="submit" name="update" Value="Update" />

                            <span class="deletePg">
                                <a href="deletePage.php?dltId=<?php echo $value['id']; ?>" onclick="return confirm('Are you Sure ????')"> Delete</a>
                             </span>
                        </td>
                    </tr>
                <?php }else{ ?>
                        <tr>
                        <td></td>
                        <td style="padding-top: 19px;">
                            <input type="submit" name="update" Value="Update" />
                        </td>
                    </tr>
                <?php } ?>
                </table>
            </form>
            <?php } } ?>
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