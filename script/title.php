  <?php 
            $query = "SELECT * FROM title_slogan WHERE id = 1";
            $slogainTit = $db->select($query);
            if($slogainTit)
            {
                while ($value = mysqli_fetch_array($slogainTit)) 
                {
                  $title = $value['title'];
                  if(isset($_GET['pageId']))
                  {
                    $id = $_GET['pageId'];
                    $query = "SELECT * FROM tbl_pages WHERE id = '$id' ";
                    $pageRes = $db->select($query);
                    $pageNam = $pageRes->fetch_assoc();
                    $name= $pageNam['name'];
            ?>
                <title><?php echo $name; ?>-<?php echo $title; ?></title>
            <?php
                  }else if(isset($_GET['id']))
                  {
                    $id = $_GET['id'];
                    $query = "SELECT * FROM tbl_post WHERE id = '$id' ";
                    $postRes = $db->select($query);
                    $postTit = $postRes->fetch_assoc();
                    $name= $postTit['title'];
                    $name = $fm->textShort($name,18);
            ?>
                <title><?php echo $name; ?>-<?php echo $title; ?></title>
            <?php
                  }else{
            ?>
                <title><?php echo $fm->title(); ?>-<?php echo $title; ?></title>
            <?php
                  }
            ?> 
                
        <?php } } ?>