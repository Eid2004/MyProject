<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
  <body>
    <table width="100%" border="1">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Expire</th>
        <th>Discount</th>
        <th>Price</th>
        <th>Quantity</th>
      </tr>
    <?php
      $handle = fopen("drugs.txt","r");
      while(!feof($handle)) {
        $line = fgets($handle);
        @list($id,$name,$expire,$discount,$price,$quantity) = @explode(",",trim($line));
        echo @"<tr>
        <td>$id</td>
        <td>$name</td>
        <td>$expire</td>
        <td>$discount</td>
        <td>$price</td>
        <td>$quantity</td>
        </tr>";
      }
      fclose($handle);
    ?>
    </table>
  </body>
</html>
