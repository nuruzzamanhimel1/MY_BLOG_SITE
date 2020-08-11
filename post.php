<?php include("inc/header.php");  ?>
        <?php 
            if(!isset($_GET['id']) || empty($_GET['id']))
            {
                header("Location: 404.php");
                //exit();
            }else{
                $id = $_GET['id'];
            }
        ?>
        <div class="contentSection contemplate clear">
            <div class="mainContent clear">
                <div class="post">
            <?php 
               $query = "SELECT * FROM tbl_post WHERE id= ".$id;
               $post = $db->select($query);
               if($post)
               {
                   $result = $post->fetch_assoc();
                   
            ?>
                    <h2>  <?php echo $result["title"]; ?></h2>
                    <h4><?php echo $fm->formatDate($result["date"]); ?> <a href="#"><?php echo $result["author"] ?></a></h4>
                    <img src="admin/uploads/<?php echo $result["image"] ?>" alt="post image">
                    <p>
                        <?php echo $result["body"]; ?>

                    </p>
<div id="disqus_thread"></div>
<script>

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://blog-site-7.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
                    
            <?php 
                $catId = $result["catId"];
               // echo $cat;
                $query = "SELECT * FROM tbl_post WHERE catId= ".$catId." ORDER BY rand() LIMIT 6 ";
               
                $relPost = $db->select($query);   
            ?>
                    <div class="relatedPost clear">
                        <h2>Related Post :</h2>
                    <?php 
                    
                    if($relPost->num_rows >1 )
                    {
                         while ($relatedPost = $relPost->fetch_assoc()) 
                         {
                    ?>
                        <a href="post.php?id=<?php echo $relatedPost["id"] ?>">
                            <img src="admin/uploads/<?php echo $relatedPost["image"] ?>" alt="post image">
                        </a>
                   <?php } ?>
               <?php }else{
                    echo "<span ><p style='color:red; font-size:25px;text-align:center;
                    padding:10px;font-weight: bold;'>No Related Post Available !! </p></span>";
                }

                ?>
                    </div><!-- if condition end................. -->
                <?php }  
                
                    else{
                        header("Location: 404.php");
                    }
                ?> 
                </div>
                
            </div>
            
               
    <?php include("inc/sidebar.php");  ?>
    <?php include("inc/footer.php");  ?>