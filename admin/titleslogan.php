<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<style type="text/css">
    .leftside{float: left; width: 70%;}
    .rightside{float: left; width: 30%;}
    .rightside img{width: 200px; height: 180px;}
    .rightside h3{margin-left: 70px;}
</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">    
                <div class="leftside"> 
        <?php 
            if(isset($_POST['update']) || $_SERVER['REQUEST_METHOD'] == 'POST')
            {
                $title =$fm->validation($_POST['title']);
                $des =$fm->validation($_POST['des']);

                $title = mysqli_real_escape_string($db->conn,$title);
                $des = mysqli_real_escape_string($db->conn,$des);


                $permited = array('png');
                $tmp_name = $_FILES['logo']['tmp_name'];
                $filename = $_FILES['logo']['name'];
                $filesize = $_FILES['logo']['size'];

                $div = explode(".",$filename);
                $extension = strtolower(end($div));
                $same_img = "logo".".".$extension;

                if(empty($title ) || empty($des )  )
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
                    echo "<span><p class='error'>You can upload only : ".strtoupper(implode(",",$permited) )."</p> </span>";
                    }
                        else
                        {
                        // upload image in server
                            move_uploaded_file($tmp_name,"uploads/logo/".$same_img);

                           
                            $query = " 
                                UPDATE title_slogan SET 
                                title = '$title',
                                des = '$des',
                                logo = '$same_img'
                                WHERE id = '1' 
                            ";

                            $result = $db->update($query);
                            if(isset($result))
                            {
                                echo "<span><p class='success'> Update POST Successfully </p> </span>";
                            }else
                            {
                                echo "<span><p class='error'>Fail To POST Update!! </p> </span>";
                            }
                        }
                }
                else{
                     $query = " 
                                UPDATE title_slogan SET 
                                title = '$title',
                                des = '$des'
                                WHERE id = '1' 
                            ";

                        $result1 = $db->update($query);
                        if(isset($result1))
                        {
                        echo "<span><p class='success'>Update Successfully </p> </span>";
                        }else
                        {
                         echo "<span><p class='error'>Fail To Update!! </p> </span>";
                        }
                    }
                }
            }
        ?>

        <?php 
            $query = "SELECT * FROM title_slogan WHERE id = 1";
            $rsltHeader = $db->select($query);
            while ($value = mysqli_fetch_array($rsltHeader)) 
            {
              
        ?>          
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $value['title']; ?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text"  value="<?php echo $value['des']; ?>" name="des" class="medium" />
                            </td>
                        </tr>
						 <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="logo" />
                        </td>
                    </tr>
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="update" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
                <div class="rightside">
                    <img src="uploads/logo/<?php echo $value['logo']; ?>" alt="logo logo"><br><br>
                    <h3>LOGO</h3>
                </div>
                </div>
            </div>
        <?php } ?>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
       <p>
         &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
