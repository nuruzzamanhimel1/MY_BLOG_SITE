<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php 
					if(isset($_GET['dltuser']))
					{
						$dltId = $_GET['dltuser'];
						$query = "DELETE FROM tbl_user WHERE id=".$dltId  ;
						$result = $db->delete($query);
						if(isset($result))
				        {
				            echo "<span><p class='success'>Delete User Successfully </p> </span>";
				        }else{
				            echo "<span><p class='error'>Fail To Delete User!! </p> </span>";
				        } 
					}

				?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="15%"> Name</th>
							<th width="15%">Username</th>
							<th width="15%">Email</th>
							<th width="30%">Description</th>
							<th width="5%">Role</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_user ";
						$alluser = $db->select($query); //Query Perform
						if(isset($alluser))
						{	
							$i = 0;
							while($value = $alluser->fetch_assoc()) // user return data
							{
								$i++;
						?>
						
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td>
							<td><?php echo $value['username']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $fm->textShort($value['des'],50); ?></td>
							<td><?php echo $value['role']; ?></td>
							<td>
								<a href="viewuser.php?viewId=<?php echo $value['id'];?>">View</a>
						<?php 
						if(Session::sess_get("userRole") == 0)
							{
						?>
							 || 
								<a href="?dltuser=<?php echo $value['id'];?>" onclick="return confirm('Are You Sure ??')">Delete</a></td>
						<?php } ?>
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