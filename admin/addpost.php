<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<div class="grid_10">
    
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">
            <?php
            if(isset($_POST['submit']) AND $_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $userId = mysqli_real_escape_string($db->conn,$_POST['userId']);
                $catId = mysqli_real_escape_string($db->conn,$_POST['catId']);
                $title = mysqli_real_escape_string($db->conn,$_POST['title']);
                $body = mysqli_real_escape_string($db->conn,$_POST['body']);
                $author = mysqli_real_escape_string($db->conn,$_POST['author']);
                $tags = mysqli_real_escape_string($db->conn,$_POST['tags']);
                
                $permited = array('jpg','jpeg','png','gif');
                $tmp_name = $_FILES['image']['tmp_name'];
                $filename = $_FILES['image']['name'];
                $filesize = $_FILES['image']['size'];
                $div = explode(".",$filename);
                $extension = strtolower(end($div)) ;
                $uploade_image = substr(md5(time()),0,10).".".$extension;


                if(empty($catId ) || empty($title ) || empty($body ) || empty($author ) || empty($tags ) || empty($filename ) )
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
                    move_uploaded_file($tmp_name,"uploads/".$uploade_image);

                    $query = "INSERT INTO tbl_post(userId,catId,title,body,image,author,tags) VALUES('$userId','$catId','$title','$body','$uploade_image','$author','$tags')";
                    $result = $db->insert($query);
                    if($result)
                    {
                    echo "<span><p class='success'>Post Upload Successfully </p> </span>";
                    }else
                    {
                     echo "<span><p class='error'>Fail To Post Upload!! </p> </span>";
                    }
                }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="catId">
                                <option>SELECT CATAGORY</option>
                                <?php
                                $query = "SELECT * FROM tbl_catagory ORDER BY id ";
                                $result = $db->select($query);
                                while($value = $result->fetch_assoc())
                                {
                                ?>
                                <option value="<?php echo $value['id'];  ?>"><?php echo $value['name']."(".$value['id'].")"; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
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
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo Session::sess_get('username');  ?>" class="medium" readonly />
                             <input type="hidden" name="userId" value="<?php echo Session::sess_get('userId');  ?>" class="medium" readonly />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="" class="medium" />
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