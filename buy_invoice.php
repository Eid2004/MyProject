<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="buyStyle.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buy Invoice</title>
</head>
<body>
  <h1>Add New Drug</h1>
  <form action="" method="post">
    <input type="number" name="drug_id" placeholder="Drug Id" class="form-control" min="1">
    <input type="text" name="drug_name" placeholder="Drug Name" class="form-control" require>
    <input type="datetime" name="expire" placeholder="Expire" class="form-control" require>
    <input type="number" name="discount" placeholder="Percent Of Discount" class="form-control" require value="0" min="0">
    <input type="number" name="price" placeholder="Price" class="form-control" value="0" min="0">
    <input type="number" name="quantity" placeholder="Quantity" value="1" class="form-control" require value="1" min="0">
    <input type="submit" value="Save">
  </form>
</body>
</html>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $drug_id = $_POST['drug_id'];
    $drug_name = trim($_POST['drug_name']);
    $expire = $_POST['expire'];
    $discount = $_POST['discount'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    if(empty($drug_id)){
      echo '<div class="alert alert-danger">Please Enter DrugID.</div>';
      exit();
    }
    if(empty($drug_name)){
      echo '<div class="alert alert-danger">Please Enter Drug Name.</div>';
      exit();
    }
    if(empty($expire)){
      echo '<div class="alert alert-danger">Please Enter The Expire.</div>';
      exit();
    }
    if(empty($discount) || $discount == 0){
      echo '<div class="alert alert-danger">Please Enter The Discount Percent.</div>';
      exit();
    }
    if(empty($price) || $price == 0){
      echo '<div class="alert alert-danger">Please Enter The Price.</div>';
      exit();
    }
    $handel = fopen("drugs.txt","a");
    $drug_data = "$drug_id,$drug_name,$expire,$discount%,$price,$quantity\n";
    fwrite($handel,$drug_data);
    fclose($handel);
  }