<?php 
    if(isset($_GET['pageId']))
  {
    $id = $_GET['pageId'];
    $query = "SELECT * FROM tbl_pages WHERE id = '$id' ";
    $pageRes = $db->select($query);
    if($pageRes)
    {
        $pagFetch = $pageRes->fetch_assoc();
        $meta_tags= $pagFetch['meta_tags'];
        $meta_des= $pagFetch['meta_des'];
?>
<meta name="keywords" content="<?php echo $meta_tags; ?>">
<meta name="description" content="<?php echo $meta_des; ?>">

<?php } } 
else if(isset($_GET['id']))
  {
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_post WHERE id = '$id' ";
    $postRes = $db->select($query);
    if($postRes)
    {
        $postFetch = $postRes->fetch_assoc();
        $tags= $postFetch['tags'];
        $meta_des= $fm->textShort($postFetch['body'],70);
?>
<meta name="keywords" content="<?php echo $tags; ?>">
<meta name="description" content="<?php echo $meta_des; ?>">

<?php } }
else{ ?>
<meta name="keywords" content="<?php echo KEYWORDS; ?>">
<meta name="description" content="<?php echo DESCRIPTION; ?>">
<?php } ?>
<meta name="robots" content="noindex, follow">
<meta name="language" content="English"> 
<meta name="reply-to" content="nuruzzaman_himel147@gmail.com">
<meta name="author" content="Nuruzzaman Himel"/>