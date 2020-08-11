   <div class="sliderSection template clear">
     	 <div id="slider">
     	 	<?php 
                    $query = "SELECT * FROM tbl_slider ";
                    $result = $db->select($query);
                    if($result)
                    {
                        while ($value = mysqli_fetch_array($result)) 
                        {
                      
                ?>   
            <a href="#"><img src="admin/uploads/slider/<?php echo $value["image"]; ?>" alt="nature 1" title="<?php echo $value["title"]; ?>"  /></a>
        <?php } } ?>
        </div>
     </div>