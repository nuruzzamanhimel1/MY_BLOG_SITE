 </div> <!-- contentSection end........... -->
      <div class="footerSection template clear">
            <div class="footerMenu clear">
            <ul>
                <li><a href="#"> Home</a></li>
                <li><a href="#"> About</a></li>
                <li><a href="#"> Content</a></li>
                <li><a href="#"> Privacy</a></li>
             </ul>
            </div>
         <?php 
            $query = "SELECT * FROM tbl_copy WHERE id = 1";
            $result = $db->select($query);
            if($result)
            { 
                while ($value = mysqli_fetch_array($result)) 
                {             
        ?>
            <p><?php echo $value['copy']; ?>, <?php echo date('Y'); ?> </p>
        <?php 
            }
        }
        ?>
        </div> 
    <div class="fixedIcon clear">
        <?php 
            $query = "SELECT * FROM tbl_social WHERE id = 1";
            $result = $db->select($query);
            if($result)
            { 
                while ($value = mysqli_fetch_array($result)) 
                { 
        ?>
        <a href="<?php echo $value['fb']; ?>"> <img src="social/fb.png" target
        ="_blank"></a>
        <a href="<?php echo $value['gp']; ?>"> <img src="social/gplus.png"></a>
        <a href="<?php echo $value['li']; ?>"> <img src="social/linkedin.png"></a>
        <a href="<?php echo $value['tw']; ?>"> <img src="social/twitt.png"></a>
        <?php 
                }
            }
            ?>
    </div>
    <div id="scrollToUp" class="clear">
        <img src="image/array.png" alt="scrollTop img">
    </div>
    <script src="js/wow.min.js"></script>
    <script src="custom.js"></script>
    <script src="js/modernizr-custom.js"></script>
       <!-- Google Analytics....................-->    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXX-X', 'auto');
    ga('send', 'pageview');
    </script>

    <!-- scrollTop ..................................... -->
    <script type="text/javascript">
        $(window).scroll(function(){
            if($(this).scrollTop()>300){
                $("#scrollToUp").fadeIn();
            }
            else{
                 $("#scrollToUp").fadeOut();
            }
            
        });

        $("#scrollToUp").click(function()
            {
                $("body,html").animate({scrollTop:0},1000);
            });
    </script>
    <script id="dsq-count-scr" src="//blog-site-7.disqus.com/count.js" async></script>
</body>
</html>