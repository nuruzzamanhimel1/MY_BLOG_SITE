<?php include("inc/header.php") ?>
<?php include("inc/sidebar.php") ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">NO</th>
							<th width="15%">Post Title</th>
							<th width="26%">Description</th>
							<th width="6%">Category</th>
							<th width="10%">Image</th>
							<th width="5%">Author</th>
							<th width="6%">Tags</th>
							<th width="10%">Date</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT tbl_post.*,tbl_catagory.name FROM tbl_post
									INNER JOIN tbl_catagory
									ON tbl_post.catId = tbl_catagory.id 
									ORDER BY tbl_post.title ";
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
								<td><?php echo $fm->textShort(ucfirst($value['body']),80); ?></td>
								<td > <?php echo ucfirst($value['name']); ?></td>
					<td>
						<span>
							<img src="uploads/<?php echo $value['image']; ?>" width="60px" height="60px">
						</span>
						
					</td>
								<td><?php echo ucfirst($value['author']); ?></td>
								<td><?php echo ucfirst($value['tags']); ?></td>
								<td > <?php echo $fm->formatDate($value['date']); ?></td>
								<td>

									<a href="viewPost.php?viewPostId=<?php echo $value['id']; ?>">View</a> 
					
						<?php 
if(Session::sess_get("userId") == $value["userId"] || Session::sess_get("userRole") == '0' )
								{

						?>
							||
							<a href="editPost.php?editPostId=<?php echo $value['id']; ?>">Edit</a> 
							||
							 <a href="deletePost.php?dltPostId=<?php echo $value['id']; ?>" onclick="return alert('Are you sure ??')">Delete</a>
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
