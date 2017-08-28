<?php include("header.php") ?>

 <?php
 include("config.php");
 $create_table = array();
 $stmt=$conn->prepare("SELECT id, category, parent_id FROM categories");
 $stmt->bind_result($c1_id,$c1_category,$p_id);
 $stmt->execute();
 while($stmt->fetch())
 {
 	 array_push($create_table, array("id"=>$c1_id,"category"=>$c1_category,"parent_id"=>$p_id));
 }
 ?>


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
								   <th>Category Id</th>
								   <th>Category Name</th>
								   <th>Parent_Id</th>
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
								</tr>
							</tfoot>
						 
							<tbody>


							<?php foreach($create_table as $key => $value):
							?>
								<tr>
								    <td><input type="checkbox" /></td>
									<td><?php echo $create_table[$key]['id'] ?></td>
									<td><?php echo $create_table[$key]['category']?></td>
									<td><?php echo $create_table[$key]['parent_id']; ?></td>
									<td>
										 <a href="delete_category.php?delete_category=<?php echo $value['id']?>" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
									</td>
								</tr>	
							<?php
							endforeach ;
							?>		

							</tbody>
							
						</table>					
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div>

			<?Php include("footer.php") ?>

