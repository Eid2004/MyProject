<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'):
    $username = trim($_POST["username"]);
    $password = trim($_POST['pass']);
    $handle = fopen("admins.txt","r");
    $loginstat = false;
    rewind($handle);
    while(!feof($handle)):
      $line = fgets($handle);
      $userandpass = explode(",",$line);
      if($username == $userandpass[0] && $password == $userandpass[1]):
        $loginstat = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="choicePageStyle.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choice your invoice</title>
</head>
<body>
  <h1 style="display:inline">Welcome,</h1> <h2 style="display:inline"><?= @$username?></h2>
  <br>
  <p style="font-size: 50px;">Choose what you want?</p>
  <button style="width: 200px; border:10px;"><a href="buy_invoice.php">Buy invoice</a></button>
  <button style="width: 200px; border:10px;"><a href="sale_invoice.php">Sale invoice</a></button>
  <button style="width: 200px; border:10px;"><a href="add_admin.php">Add New Admin</a></button>
  
</body>
</html>
<?php
        break;
      endif;
    endwhile;
    if(!$loginstat ){ 
      header("Location: index.php?error=1");
    }
    if(empty($username) || empty($password)) {
      header("Location: index.php?empty=1");
    }
    fclose($handle);
  endif;
?>