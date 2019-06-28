<?php include 'config/db.php'; ?>
<?php 
  if(isset($_POST['item-id']) && isset($_POST['item-name']) && isset($_POST['item-price']) && isset($_POST['item-stock'])) {
    $itemId = $_POST['item-id'];
    $itemName = $_POST['item-name'];
    $itemPrice = $_POST['item-price'];
    $itemStock = $_POST['item-stock'];

    
    $message = "";

    $query = "UPDATE `items` SET `name`=:name, `price`=:price, `stock`=:stock 
              WHERE id=:id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $itemId);
    $stmt->bindParam(':name', $itemName);
    $stmt->bindParam(':price', $itemPrice);
    $stmt->bindParam(':stock', $itemStock);

    if($stmt->execute()) {
      $message = "2";
      header('Location: index.php?message=' . $message);
    } else {
      print_r($stmt->errorInfo());
    }
  }