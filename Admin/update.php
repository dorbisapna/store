	<?php include("header.php"); ?>	
	 <?php
      $update_id=$_GET['update_id'];
      include("config.php");
      $items_update=array();

      $stmt = $conn->prepare("SELECT name,price,category,image,id FROM items WHERE id=?");
      $stmt->bind_param("i",$update_id);

		$stmt->bind_result($items_name,$items_price,$items_category,$items_image,$items_id);
		$stmt->execute();
		while($stmt->fetch())
		{
		 $name=$items_name;
		 $price=$items_price;
		 $category=$items_category;
		 $image=$items_image;
		 $id=$items_id;	
		}

      ?>
      <?php

      $page=basename($_SERVER['PHP_SELF']);

	 ?>
	<?php include("sidebar.php"); ?>

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

			<h3> Add Products</h3>
				
			</div>

			<div class="content-box-content">
					
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<!--<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>-->

						<form action="update_form.php" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Product Name</label>
										<input class="text-input small-input" type="text" name="p_name" value="<?php echo $name ?>" id="small-input" /> <span class="input-notification success png_bg"></span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Product Price</label>
									<input class="text-input medium-input datepicker" type="text" name="p_price" value="<?php echo $price ?>">
								</p>
								
								<p>
									<label>Categories</label>              
									<select name="p_category" class="small-input">
									    <option value="<?php echo $category ?>"><?php echo $category ?></option>
										<option value="select">Select Category</option>
										<option value="Electronics">Electronics</option>
										<option value="Apparels">Accessories</option>
										<option value="Sports">Sports</option>
									</select> 
								</p>

								</p>
								
								<p>
									<label>Product Image</label>
									<input  type="file" name="image" value="<?php echo $image ?>" >
								</p>

								</p>
								<input type="hidden" name="p_id" value="<?php echo $id ?>">
								<p>

								<!--<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>-->
								
								<!--<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>-->
								
								<!--<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>-->
								
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
			
		
