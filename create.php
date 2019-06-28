<?php include 'config/db.php'; ?>
<?php 
  if(isset($_POST['item-name']) && isset($_POST['item-price']) && isset($_POST['item-stock'])) {
    $itemName = $_POST['item-name'];
    $itemPrice = $_POST['item-price'];
    $itemStock = $_POST['item-stock'];

    $message = "";

    $query = 'INSERT INTO items(name, price, stock) VALUES(:name, :price, :stock)';
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $itemName);
    $stmt->bindParam(':price', $itemPrice);
    $stmt->bindParam(':stock', $itemStock);

    if($stmt->execute()) {
      $message = 1;
      header('Location: index.php?message=' . $message);
    } else {
      print_r($stmt->errorInfo());
    }
  }