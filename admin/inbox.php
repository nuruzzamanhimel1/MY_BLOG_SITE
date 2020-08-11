<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
        <?php 
         if(isset($_GET['seenId']) )
		{
			$id = $_GET['seenId'];
			$query = "UPDATE tbl_contuct SET status = '1' WHERE id =".$id;

			$result = $db->update($query);
			if(isset($result))
			{
			echo "<span><p class='success'>Message Send In Seen Box. </p> </span>";
			}else{
			echo "<span><p class='error'>Somthing Wrong!! </p> </span>";
			}
		}
        ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="30%">Body</th>
							<th width="15%">Date</th>
							<th width="20">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contuct WHERE status='0' ORDER BY id DESC";
						$Conresult = $db->select($query); //Query Perform
						if($Conresult)
						{	
							$i = 0;
							while($value = $Conresult->fetch_assoc()) // user return data
							{
								$i++;
						?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['firstname']." ".$value['lastname']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $fm->textShort($value['body'],105); ?></td>
							<td><?php echo $fm->formatDate($value['date']); ?></td>
							<td>
								<a href="viewMass.php?viewId=<?php echo $value['id'];?>">View</a> 
								|| 
								<a href="replyMass.php?replyId=<?php echo $value['id'];?>">Reply</a>
								|| 
								<a href="?seenId=<?php echo $value['id'];?>" onclick="return alert('Are You sure Move the Message ???');">Seen</a>
							</td>
						</tr>	
						<?php
							}
						}
						else{
							echo "<span ><p class='error'>Message Not Available !!! </p> </span>";
						}
						?>
					</tbody>
				</table>
               </div>
            </div>

            <div class="box round first grid">
                <h2>Seen</h2>
                <div class="block">    
        <?php  
		    if(isset($_GET['dltId']) )
		    {
		        $id = $_GET['dltId'];
		        $query = "DELETE FROM tbl_contuct WHERE id=".$id;
				   	$result1 = $db->delete($query);
				   	if($result1)
				   	{
				   		 echo "<span><p class='success'>Delete Message  In Seen Box. </p> </span>";
				   	}else{
				   		echo "<span><p class='error'>Somthing Wrong!! </p> </span>";
				   	}
		    }
		?>    
		<?php 
         if(isset($_GET['unseenId']) )
		{
			$id = $_GET['unseenId'];
			$query = "UPDATE tbl_contuct SET status = '0' WHERE id =".$id;

			$result = $db->update($query);
			if(isset($result))
			{
			echo "<span><p class='success'>Message Send In Inbox Box. </p> </span>";
			}else{
			echo "<span><p class='error'>Somthing Wrong!! </p> </span>";
			}
		}
        ?>
                   <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial No.</th>
							<th width="10%">Name</th>
							<th width="15%">Email</th>
							<th width="30%">Body</th>
							<th width="15%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_contuct WHERE status='1' ";
						$seenRes = $db->select($query); //Query Perform
						if($seenRes)
						{	
							$i = 0;
							while($value = $seenRes->fetch_assoc()) // user return data
							{
								$i++;
						?>

						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $value['firstname']." ".$value['lastname']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $fm->textShort($value['body'],105); ?></td>
							<td><?php echo $fm->formatDate($value['date']); ?></td>
							<td>
								<a href="?unseenId=<?php echo $value['id'];?>" onclick="return alert('Are You sure Move the Message Inbox ???');">Unseen</a>
								||
								<a href="viewMass.php?viewId=<?php echo $value['id'];?>">View</a>
								||
								<a href="?dltId=<?php echo $value['id'];?>" onclick="return alert('Are You sure to Delete ???');">Delete</a>
							</td>
						</tr>	
						<?php
							}
						}
						else{
							echo "<span ><p class='error'>Message Not Seen !!! </p> </span>";
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        
<?php include("inc/footer.php"); ?>
<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>