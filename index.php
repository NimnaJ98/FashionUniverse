<?php require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';

$sql="SELECT * FROM products WHERE featured =1";
$featured = $db->query($sql);
 ?>

<!--remove spaces and center images-->
  <div class="col-md-2"> </div>

<!--main content of products-->
    <div class="col-md-8">
      <div class="row">
        <h2 class="text-center">Featured Products</h2>
        <?php while($product = mysqli_fetch_assoc($featured)): ?>
        <div class="col-md-3">
          <h4><?=$product['title']; ?></h4>
          <img src="<?=$product['image'];  ?>" alt="<?=$product['title'];  ?>" id="images"/>
          <p class="list-price text-danger">List Price: <s>$<?=$product['list_price'];  ?></s></p>
          <p class="price">Our Price: $<?=$product['price'];  ?></p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button>
        </div>
      <?php endwhile; ?>
      </div>

<!--Details modal-->
  <?php include 'details-modal.php';
        include 'includes/footer.php';
   ?>

  </body>
</html>
