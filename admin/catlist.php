<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
<?php 
	if(isset($_GET['dltId']))
	{
		$dltId = base64_decode($_GET['dltId']);
		$query = "DELETE FROM tbl_catagory WHERE id=".$dltId  ;
		$result = $db->delete($query);
		if(isset($result))
        {
            echo "<span><p class='success'>Delete Catagory Successfully </p> </span>";
        }else{
            echo "<span><p class='error'>Fail To Delete Catagory!! </p> </span>";
        } 
	}
	// else{
		
	// }


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
					<?php 
                    if(Session::sess_get("userRole") == '0' OR Session::sess_get("userRole") == '2')
                        {
            		?>
							<th >Serial No.</th>
							<th >Category Name</th>
							<th>Action</th>
            		<?php }else{ ?>
							<th width="50%">Serial No.</th>
							<th  width="50%">Category Name</th>
							
					<?php } ?>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_catagory ORDER BY id";
						$result = $db->select($query); //Query Perform
						if(isset($result))
						{	
							$i = 0;
							while($value = $result->fetch_assoc()) // user return data
							{
								$i++;
						?>
						
						<tr class="odd gradeX">
						<?php 
		                if(Session::sess_get("userRole") == '0' OR Session::sess_get("userRole") == '2')
		                    {
		        		?>	
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
						
							<td>
								<a href="editCat.php?catId=<?php echo $value['id'];?>">Edit</a>
								 || 
								 <a href="?dltId=<?php echo base64_encode($value['id']);?>" onclick="return confirm('Are You Sure ??')">Delete</a>
							</td>
					<?php }else{
						?>
						<td><?php echo $i; ?></td>
						<td><?php echo $value['name']; ?></td>
	`				<?php 	} ?>
						</tr>
						
						<?php
							}
						}
						else{
							echo "<span ><p class='error'>Category Not Available !!! </p> </span>";
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
 <?php include("inc/footer.php") ?>       
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>