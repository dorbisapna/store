<?php include("functions.php"); ?>
<?php include("header.php"); ?>
<?php $index= basename($_SERVER['PHP_SELF']); ?>
 
  <!-- / menu -->  
 
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="add_to_cart.php?index_no=<?php echo $index ; ?>" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php foreach($_SESSION['cart'] as $key=>$value) : ?>
                      <tr>
                        <td><a class="remove" href="add_to_cart.php?delete_id=<?php echo $value['id'] ?>&index_no=<?php echo $index ; ?>"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="img/<?php echo $value['image'] ?>" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#"><?php echo $value['name'] ?></a></td>
                        <td><?php echo $value['new_price'] ?></td>
                        <td><input class="aa-cart-quantity" type="number" value="<?php echo $value['quantity'] ?>"></td>
                        <td><?php echo $value['quantity']  *  $value['new_price'] ?> </td>
                      </tr>
                    <?php endforeach ; ?>
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total_Price </th>
                     <td><?php if(isset($_SESSION['total_price']))
                     echo $_SESSION['total_price'];
                      ?>
                     </td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

<?php include("footer.php"); ?>