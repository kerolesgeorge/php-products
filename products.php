<?php

require_once 'backend/config.php';

getCategories();

function getCategories() {
  global $db, $categories;
  $sql = 'select * from categories';
  $categories = $db -> query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Products Home Page</title>
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- bootstrap -->
  <link rel="stylesheet" href="css/all.min.css"> <!-- fontaweson -->
  <link rel="stylesheet" href="css/categories.css"> <!-- my-style -->
</head>
<body>
<div class="wrapper">

  <header class="nav_bar"></header>

  <section class="main-section">
    <h1>Products Page</h1>
  </section>

</div>

<script src="js/jquery-3.4.1.min.js"></script> <!-- jQuery script -->
<script src="js/bootstrap.min.js"></script> <!-- bootstrap -->
<script src="js/front.js"></script>
</body>
</html>