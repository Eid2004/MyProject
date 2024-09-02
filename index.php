<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LogIn</title>
</head>
<body>
  <div class="container">
    <div class="login">
      <h1>LogIn</h1>
      <form action ="choice_invice.php" method="post">
        <input type="text" placeholder="Enter your username" name="username" require class="form-control">
        <input type="password" placeholder="Enter your password" name="pass" require class="form-control">
        <input type="submit" value="login" class="form-control">
      </form>
      <?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
            <div class="alert alert-danger">
                Username Or Password Not Correct. Please try again.
            </div>
            <!-- <script>
              alert("Username Or Password Not Correct. Please try again.")
            </script> -->
        <?php endif; ?>
      <?php if (isset($_GET['empty']) && $_GET['empty'] == '1'): ?>
            <div class="alert alert-danger">
              Please Fill username or password.
            </div>
        <?php endif; ?>
    </div>
    <br>
  </div>
</body>
</html>