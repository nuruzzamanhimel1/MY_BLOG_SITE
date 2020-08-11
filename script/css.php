<link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <link href="style.css" type="text/css" rel="stylesheet">`

 <?php 
        $query = "SELECT * FROM tbl_theme WHERE id = '1' ";
        $result = $db->select($query);
        //query validation...
        if($result)
        {
            while ($value = mysqli_fetch_assoc($result)) 
            {
            	if($value['theme'] == "default")
            	{
 ?>
				<link href="theme/default.css" type="text/css" rel="stylesheet">`
 		<?php	}elseif($value['theme'] == "green"){?>

				<link href="theme/green.css" type="text/css" rel="stylesheet">`
 		<?php	}elseif($value['theme'] == "red"){?>
				<link href="theme/red.css" type="text/css" rel="stylesheet">`
 		<?php	}}}?>
