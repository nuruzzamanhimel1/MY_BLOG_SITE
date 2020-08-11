<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
    if(!isset($_GET['editPostId']) || $_GET['editPostId'] == NULL)
    {
        header("Location: postlist.php");
    }else{
        $editPostId = $_GET['editPostId'];
    }
?>
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


                if(empty($catId ) || empty($title ) || empty($body ) || empty($author ) || empty($tags) )
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
                        // upload image in server
                            move_uploaded_file($tmp_name,"uploads/".$uploade_image);

                           
                            $query = " 
                                UPDATE tbl_post SET 
                                userId = '$userId',
                                catId = '$catId',
                                title = '$title',
                                body = '$body',
                                image = '$uploade_image',
                                author = '$author',
                                tags = '$tags'
                                WHERE id = $editPostId 
                            ";

                            $result = $db->update($query);
                            if($result)
                            {
                            echo "<span><p class='success'>Post Update Successfully </p> </span>";
                            }else
                            {
                             echo "<span><p class='error'>Fail To Post Update!! </p> </span>";
                            }
                        }
                }
                else{
                    $query = " 
                            UPDATE tbl_post SET 
                            userId = '$userId',
                            catId = '$catId',
                            title = '$title',
                            body = '$body',
                            author = '$author',
                            tags = '$tags'
                            WHERE id = $editPostId 
                        ";

                        $result = $db->update($query);
                        if($result)
                        {
                        echo "<span><p class='success'>Post Update Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Post Update!! </p> </span>";
                        }
                    }
                
                }//....
               
            }
            ?>

            <form action="" method="post" enctype="multipart/form-data">

                <table class="form">
            <?php 
                $query = "SELECT * FROM tbl_post WHERE id = ".$editPostId ;
                $edtPostRes = $db->select($query);
                while($edtvalue = $edtPostRes->fetch_assoc())
                {
            ?>
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
                                <option value="<?php echo $value['id'];  ?>" 
                                    <?php 
                                        if($edtvalue['catId'] == $value['id'])
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
                            <input type="text" name="title" value="<?php echo $edtvalue['title'] ?>"  class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="body">
                                <?php echo $edtvalue['body'] ?>
                            </textarea>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $edtvalue['image'] ?>" width="150px" height="80px"><br>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Author</label>
                        </td>
                        <td>
                            <input type="text" name="author" value="<?php echo Session::sess_get('username');  ?>" class="medium" readonly />
                        </td>
                         <input type="hidden" name="userId" value="<?php echo Session::sess_get('userId');  ?>" class="medium" readonly />
                    </tr>
                    <tr>
                        <td>
                            <label>Tags</label>
                        </td>
                        <td>
                            <input type="text" name="tags" value="<?php echo $edtvalue['tags'] ?>" class="medium" />
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
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