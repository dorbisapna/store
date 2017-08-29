<?php include("header.php"); ?>
<?php// include("config.php"); ?>

<?php

/*$browse_all_product = array();

$stmt=$conn->prepare("SELECT name,new_price,old_price,image FROM dailyshop");
$stmt->bind_result($w_name,$w_new_price,$w_old_price,$w_image);
$stmt->execute();
while($stmt->fetch())
{
  $browse_all_product[]=array("name"=>$w_name,"new_price"=>$w_new_price,"old_price"=>$w_old_price,"image"=>$w_image);
}*/

?>

<?php
  $links = "";
  $page_id = $_GET['page_id'];
  $max_limit=9;
  $min_limit=($page_id-1) * $max_limit;

  $browse_all_product = array();
  include("config.php");

  $stmts = $conn->prepare("SELECT count(*) FROM dailyshop");
  $stmts->bind_result($t_records);
  $stmts->execute();

  while ($stmts->fetch())
   {
    $t1_records=$t_records;
   }
   $records=ceil($t1_records/$max_limit);

   if($page_id < 1 || $page_id > $records)
   {
    header("Location:product.php?page_id=1");
    }

    $browse_all_product = array();
    $stmt = $conn->prepare("SELECT id,name,new_price,old_price,image FROM dailyshop LIMIT ?,?");
    $stmt->bind_param("ii",$min_limit,$max_limit);
    $stmt->bind_result($id2,$name2,$new_price2,$old_price2,$image2);
    $stmt->execute();
    
    while($stmt->fetch())
    {
    $browse_all_product[]=array("id"=>$id2,"name"=>$name2,"new_price"=>$new_price2,"old_price"=>$old_price2,"image"=>$image2);
    }
  
?>

 <?php 

            //$box = array();
            $checkbox = array();
            $stmt=$conn->prepare("SELECT category FROM categories");
            $stmt->bind_result($c_category);
            $stmt->execute();
            while($stmt->fetch())
            {
              $checkbox[]=array("category"=>$c_category);
            }
            
            
            if(isset($_POST['submit']))
            {
            if(isset($_POST['param']))
            {
              //$dailyshop = array();
              $dailyshop_cat=$_POST['param'];
              $box = array();
              foreach ($box as $value) 
              {
                $stmt=$conn->prepare("SELECT * FROM dailyshop WHERE category=?");
                $stmt->bind_result($c_name,$c_new_price,$c_old_price,$c_image);
                $stmt->execute();
                while($stmt->fetch())
                {
                  $box[] = array("name"=>$c_name,"new_price"=>$c_new_price,"old_price"=>$c_old_price,"image"=>$c_image);
                }
              }
            }
          }
             ?>

  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Fashion</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li class="active">Women</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
          <div class="aa-product-catg-content">
            <div class="aa-product-catg-head">
              <div class="aa-product-catg-head-left">
                <form action="" class="aa-sort-form">
                  <label for="">Sort by</label>
                  <select name="">
                    <option value="1" selected="Default">Default</option>
                    <option value="2">Name</option>
                    <option value="3">Price</option>
                    <option value="4">Date</option>
                  </select>
                </form>
                <form action="" class="aa-show-form">
                  <label for="">Show</label>
                  <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                  </select>
                </form>
              </div>
              <div class="aa-product-catg-head-right">
                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
              </div>
            </div>
            <div class="aa-product-catg-body">
              <ul class="aa-product-catg">
                <!-- start single product item -->
                <?php foreach($browse_all_product as $key => $value): ?>
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="img/<?php echo $value['image'] ?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php echo $value['name'] ?></a></h4>
                      <span class="aa-product-price"><?php echo $value['new_price'] ?></span><span class="aa-product-price"><del><?php echo $value['old_price'] ?></del></span>
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
              <?php endforeach ; ?>

               <?php //foreach($box as $key => $value): ?>
                <!--<li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="img/<?php// echo $value['image'] ?>" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                    <figcaption>
                      <h4 class="aa-product-title"><a href="#"><?php //echo $value['name'] ?></a></h4>
                      <span class="aa-product-price"><?php //echo $value['new_price'] ?></span><span class="aa-product-price"><del><?php //$value['old_price'] ?></del></span>
                      <p class="aa-product-descrip">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam accusamus facere iusto, autem soluta amet sapiente ratione inventore nesciunt a, maxime quasi consectetur, rerum illum.</p>
                    </figcaption>
                  </figure>                         
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>-->
                  <!-- product badge -->
                 <!-- <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>-->
              <?php //endforeach ; ?>
                <!-- start single product item -->                                      
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>
            <div class="aa-product-catg-pagination">
              <nav>
                <ul class="pagination">
                  <li>
                    <a href="product.php?page_id=1" aria-label="Previous"><?php if($page_id==1):?><a href="product.php?page_id=<?php echo $page_id ?>"></a><?php endif;?>
                    <?php if($page_id==1):?><a href="product.php?page_id=<?php echo $page_id ?>"></a><?php endif;?>
                      <span aria-hidden="true">&laquo;</span>
                    </a>


                      <?php for ($i=1; $i<=$records; $i++):
                      if($page_id==$i)
                      {
                        $links.= "<a href='product.php?page_id=".$i."'>".$i."</a>";
                        $last=$i;
                      }
                      else
                      {
                         $links.= "<a href='product.php?page_id=".$i."'>".$i."</a>";  
                        }
                      endfor;
                      echo $links;  ?>

                   <?php if($page_id==$records):?>

                    <a href='product.php?page_id=<?php echo $page_id + 1;?>' aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php endif;?>
                    <?php if($page_id!==$records):?>

                    <a href='product.php?page_id=<?php echo $page_id +1 ?>' aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                    <?php endif;?>

                  </li>
                  <!--<li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>-->
                  <li>
                      <?php //if($page_id==$records):?>

                   <!-- <a href='product.php?page_id=<?php //echo $last?>' aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>-->
                    <?php //endif;?>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
           
            <div class="aa-sidebar-widget">
              <h3>Category</h3>
              <ul class="aa-catg-nav">
              <form method="post" action="">
                <?php
                foreach($checkbox as $key=>$value):
                ?>
               <li><input type="checkbox" name="param[]" value="<?php echo $value['category'] ?>"><?php echo $value['category'] ?></li>
             <?php endforeach ; ?>
             <li><input type="submit" value="submit" name="submit"></li>
                </form>
              </ul>
            </div>
            
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Tags</h3>
              <div class="tag-cloud">
                <a href="#">Fashion</a>
                <a href="#">Ecommerce</a>
                <a href="#">Shop</a>
                <a href="#">Hand Bag</a>
                <a href="#">Laptop</a>
                <a href="#">Head Phone</a>
                <a href="#">Pen Drive</a>
              </div>
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Price</h3>              
              <!-- price range -->
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Filter</button>
               </form>
              </div>              

            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Shop By Color</h3>
              <div class="aa-color-tag">
                <a class="aa-color-green" href="#"></a>
                <a class="aa-color-yellow" href="#"></a>
                <a class="aa-color-pink" href="#"></a>
                <a class="aa-color-purple" href="#"></a>
                <a class="aa-color-blue" href="#"></a>
                <a class="aa-color-orange" href="#"></a>
                <a class="aa-color-gray" href="#"></a>
                <a class="aa-color-black" href="#"></a>
                <a class="aa-color-white" href="#"></a>
                <a class="aa-color-cyan" href="#"></a>
                <a class="aa-color-olive" href="#"></a>
                <a class="aa-color-orchid" href="#"></a>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Recently Views</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <h3>Top Rated Products</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->

<?php include("footer.php"); ?>