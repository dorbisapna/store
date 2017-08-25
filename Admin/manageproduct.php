<?php include("header.php") ?>

<?php include("pagination.php") ?>

<?php

    $page=basename($_SERVER['PHP_SELF']);

 ?>

<?php include("sidebar.php") ?>

<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome John</h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/pencil_48.png" alt="icon" /><br />
					Write an Article
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/paper_content_pencil_48.png" alt="icon" /><br />
					Create a New Page
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/image_add_48.png" alt="icon" /><br />
					Upload an Image
				</span></a></li>
				
				<li><a class="shortcut-button" href="#"><span>
					<img src="resources/images/icons/clock_48.png" alt="icon" /><br />
					Add an Event
				</span></a></li>
				
				<li><a class="shortcut-button" href="#messages" rel="modal"><span>
					<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Open Modal
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->

                    <div class="content-box" id="products_list">

					<div class="content-box-header">

					<h3> Manage Products</h3>
						
					</div>
					<div class="tab-content" id="tab2">


						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Product Name</th>
								   <th>Product Price</th>
								   <th>Product Category</th>
								   <th>Product Image</th>
								</tr>
								
							</thead>
						 
							<tfoot class="check-all">
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="manageproduct.php?page_id=1" title="First Page">&laquo; First</a><?php if($page_id==1):?><a href="manageproduct.php?page_id=<?php echo $page_id ?>" title="Previous Page">&laquo; Previous</a>
												<?php endif;?>

											<?php if($page_id!=1):?><a href="manageproduct.php?page_id=<?php echo $page_id-1?>" title="Previous Page">&laquo; Previous</a>
												<?php endif;?>

											<?php for ($i=1; $i<=$records; $i++):
											if($page_id==$i)
											{
												$links.= "<a href='manageproduct.php?page_id=".$i."' class='number current'>".$i."</a>";
												$last=$i;
											}
											else
											{
             								$links.= "<a href='manageproduct.php?page_id=".$i."' class='number '>".$i."</a>";  
             							     }
											endfor;
											echo $links;	?>

											<?php if($page_id==$records):?>

											<a href='manageproduct.php?page_id=<?php echo $last?>' title="Next Page">Next &raquo;</a>

										    <?php endif;?>
											
											<?php if($page_id!=$records):?>

											<a href='manageproduct.php?page_id=<?php echo $last+1?>' title="Next Page">Next &raquo;</a>

										    <?php endif;?>
											<a href="manageproduct.php?page_id=<?php echo $records ?>" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
						 
							<tbody>


							<?php foreach($table as $key => $value):
							?>
								<tr>
								    <td><input type="checkbox" /></td>
									<td><?php echo $value['name'] ?></td>
									<td><?php echo "$".$value['price']?></a></td>
									<td><?php echo $value['category']?></td>
									<td><img src="../Uploads/images/<?php echo $value['image']?>"></td>
									<td>
										 <a href="delete.php?delete_id=<?php echo $value['id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										  <a href="update.php?update_id=<?php echo $value['id']?>" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a></td>
								</tr>


							<?php endforeach; 
							?>

							</tbody>
							
						</table>					
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div>

			<?Php include("footer.php") ?>
