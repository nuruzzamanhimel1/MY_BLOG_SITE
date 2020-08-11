      <div class="slidebar clear">
            <div class="sameSidebar clear"> 
                <h2> Categories</h2>
                <?php 
                    $query = "SELECT * FROM tbl_catagory";
                    $category = $db->select($query);
                ?>
                <ul>
                <?php 
                   if($category)
                   {
                    //while($result = mysqli_fetch_assoc($catagory))
                    while ($result = $category->fetch_assoc()) 
                    {
                    
                ?>
                    <li><a href="posts.php?catId=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
              <?php } ?>
                <?php 
                  }else{  

                ?> 
                    <li>No Category Created</li>
              <?php } ?>
                </ul>
            </div>
    <div class="sameSidebar clear"> 
        	    <h2> Popular Articls</h2>
             <?php 
                $query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 5";
                $sameSidbr = $db->select($query);
                if($sameSidbr)
               {

                while ($result = $sameSidbr->fetch_assoc()) 
                {
                
             ?>
                

                <div class="popular clear">
                    <a href="post.php?id=<?php echo $result["id"] ?>">
                        <h3><?php echo $result["title"]; ?></h3>
                    </a>
                    <a href="post.php?id=<?php echo $result["id"] ?>">
                         <img src="admin/uploads/<?php echo $result["image"] ?>" alt="post image">
                    </a>
                    <p>
                   <?php echo $fm->textShort($result["body"],100); ?>
                    </p> 
                    
                </div>
                
              <?php } ?>
            <?php }  else{
                echo "Popular Post Not Found !!";
            }?>   
            </div>
           
        	
           
        </div> 