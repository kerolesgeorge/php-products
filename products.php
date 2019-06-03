<?php

function dbConnect() {
  require 'backend/config.php';
  return $db;
}

$cat_id = $_GET['cat_id'];

function getProducts($cat_id) {
  $db = dbConnect();
  $sql = "SELECT products.*, images.image_url FROM products INNER JOIN images
    ON images.product_id = products.id WHERE products.cat_id = $cat_id";
  $products = $db -> query($sql);
  return $products;
}

function getCategoryName($cat_id) {
  $db = dbConnect();
  $sql = "SELECT name FROM categories WHERE id = $cat_id";
  $name = $db -> query($sql);
  unset($db);
  return $name -> fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Products Home Page</title>
  <link rel="stylesheet" href="style/css/bootstrap.min.css"> <!-- bootstrap -->
  <link rel="stylesheet" href="style/css/all.min.css"> <!-- fontaweson -->
  <link rel="stylesheet" href="style/css/products.css"> <!-- my-style -->
</head>
<body>
<div class="wrapper">

  <header class="nav_bar"></header>

  <section class="main-section">
    <h1>
      <?php
        $categoy = getCategoryName($cat_id); 
        echo $category['name']; 
      ?>
    </h1>

    <!-- show all products -->
    <?php
    $products = getProducts($cat_id); 
    foreach($products as $product): 
    ?>
    <a href="product.php?id=<?= $product['id'] ?>">
      <div class="card mb-3">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="<?= $product['image_url'] ?>" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?= $product['name'] ?></h5>
              <p class="card-text">
                <?= $product['description'] ?>
              </p>
              <p class="card-text"><small class="text-muted"><?= $product['price'] ?></small></p>
            </div>
          </div>
        </div>
      </div>
    </a>
    <?php endforeach; ?>
    
  </section>

</div>

<script src="js/jquery-3.4.1.min.js"></script> <!-- jQuery script -->
<script src="js/bootstrap.min.js"></script> <!-- bootstrap -->
<script src="js/front.js"></script>
</body>
</html>