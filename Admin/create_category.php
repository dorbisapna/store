<?php include("header.php") ?>
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

			<div class="content-box">

			<div class="content-box-header">

			<h3>Create Category</h3>
				
			</div>

			<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->

						<form action="insert_categeory.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Category Name</label>
										<input class="text-input small-input" type="text" name="cat_name" id="small-input" /><span class="input-notification success png_bg"></span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>

								<p>
									<?php include("config.php") ?>
									<?php
									$p_id=0;
									$stmt=$conn->prepare("SELECT category FROM categories where parent_id=?");
									$stmt->bind_param("i",$p_id);
									$stmt->bind_result($category1);
									$stmt->execute();

									$dropdown = array();

									while($stmt->fetch())
									{
										$dropdown[] = array("category"=>$category1);

									} 

									?>
								</p>
								
								<p>
									<label>Categories</label>              
									<select name="cat_category" class="small-input">
										<option value="select">Select Category</option>
										<?php foreach($dropdown as $key=>$value): ?>
										 <option value="<?php echo $value['category']?>"><?php echo $value['category']?>
										 </option>
										<?php endforeach; ?>
									</select>	
								</p>
								

								<p>
									<input class="button" name="submit" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						</div>
						</div>
						
					</div> <!-- End #tab1 -->

					<?php include("footer.php") ?>
