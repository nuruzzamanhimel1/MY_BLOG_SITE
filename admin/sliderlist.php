<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th >NO</th>
							<th >Slider Title</th>
							<th >Slider Image</th>
							<?php 
						if(Session::sess_get("userRole") == '0' )
							{

						?>
							<th >Action</th>
						<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_slider ORDER BY id ASC ";
						$result = $db->select($query);
						if($result)
						{	$i = 0;
							while($value = $result->fetch_assoc())
							{
								$i++;
					?>
							<tr class="odd gradeX">
								<td><?php echo $i; ?></td>
								<td><?php echo ucfirst($value['title']); ?></td>		
					<td>
						<span>
							<img src="uploads/slider/<?php echo $value['image']; ?>" width="60px" height="60px">
						</span>
						
					</td>
								
					<td>
						<?php 
						if(Session::sess_get("userRole") == '0' )
							{

						?>
							<a href="editSlider.php?edtsliderId=<?php echo $value['id']; ?>">Edit</a> 
							||
							 <a href="deleteSlider.php?dltsliderId=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure ??')">Delete</a>
						<?php } ?>

									
								</td>
							</tr>
					<?php 
							}
						}
					?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
 <?php include("inc/footer.php") ?>
