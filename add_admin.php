<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="addAdminStyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new admin</title>
</head>
<body>
  <h1>Add New Admin</h1>
  <form action="" method="post">
    <input type="hidden" name="id" value="<?= isset($_POST['id']) ? $_POST['id'] + 1 : 1; ?>">
    <input type="text" name="fname" placeholder="First Name" require>
    <input type="text" name="lname" placeholder="Last Name" require>
    <input type="text" name="username" placeholder="Username" require>
    <input type="password" name="pass" placeholder="Password" require>
    <input type="text" name="phone" placeholder="Phone Number" require>
    <input type="submit" value="Save" name="save">
  </form>
</body>
</html>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['pass']);
    $phone = $_POST['phone'];
    $id = $_POST['id'];
    if(empty($fname)){ 
      echo "<h1 style='color: red;'>*Please Enter The First Name</h1>";
      exit();
    }
    if(empty($lname)){ 
      echo "<h1 style='color: red;'>*Please Enter The Last Name</h1>";
      exit();
    }
    if(empty($username)){ 
      echo "<h1 style='color: red;'>*Please Enter The Username</h1>";
      exit();
    }
    if(empty($password)) {
      echo "<h1 style='color: red;'>*Please Enter The Password</h1>";
      exit();
    }
    if(empty($phone)){ 
      echo "<h1 style='color: red;'>*Please Enter The Phone number</h1>";
      exit();
    }
    if(!preg_match('/^[0-9]{11}$/',$phone)) {
      echo "<h1 style='color: red;'>*Phone number not correct</h1>";
      exit();
    }
    $handel = fopen("admins.txt","a");
    $admin_data = "$username,$password,$id,$fname,$lname,$phone\n";
    fwrite($handel,$admin_data);
    fclose($handel);
  }
?>