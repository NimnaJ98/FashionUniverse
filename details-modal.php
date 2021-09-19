<?php
require_once 'core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE id ='$id'";
$result = $db->query($sql);
$product = mysqli_fetch_assoc($result);
$brand_id = $product['brand'];
$sql = "SELECT brand FROM brand WHERE id ='$brand_id'";
$brand_query = $db->query($sql);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $product['sizes'];
$sizestring = rtrim($sizestring,',');
$size_array = explode(',',$sizestring);
 ?>



<div class="modal fade details-1" id="details-1" tableindex="-1" role="dialog" aria-labelledby=""="details-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
      <button class="close" type="button" data-dismiss="modal" aria-label="close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h4 class="modal-title text-center"><?=$product['title']; ?></h4>
    </div>
    <div class="modal-body">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <div class="center-block fotorama" data-autoplay="true">
              <?php $photos = explode(',',$product['image']);
                    foreach ($photos as $photo): ?>
              <img src="<?=$photo; ?>" alt="<?=$product['title']; ?>" class="details img-responsive">
            <?php endforeach; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <h4>Details</h4>
            <p><?=n12br($product['description']); ?></p>
            <hr/>
            <p>Price: $<?=$product['price']; ?></p>
            <p>Brand: $<?=$brand['brand']; ?></p>
            <form action="add_cart.php" method="post" id="add_product_form">
              <input type="hidden" name="product_id" value="<?=$id; ?>">
              <input type="hidden" name="available" id="available" value="">
              <div class="form-group">
                <div class="col-xs-3">
                  <label for="quantity" id="quantity-label">Quantity:</label>
                  <input type="text" class="form-control" id="quantity" name="quantity"/>
                  <style>
                    #quantity{
                      margin-left: -17px;
                    }
                    #quantity-label{
                      margin-left: -17px;
                    }
                  </style>
                </div><br/> <br/><br/>
                <div class="form-group">
                  <label for="size">Size:</label>
                  <select class="form-control" name="size" id="size">
                    <option value=""></option>
                    <option value="28">28</option>
                    <option value="32">32</option>
                    <option value="36">36</option>
                  </select>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-warning"> <span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
    </div>
  </div>
  </div>
</div>
