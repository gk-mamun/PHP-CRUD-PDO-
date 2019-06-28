<?php include 'config/db.php'; ?>
<?php 
  if(isset($_POST['delete-item'])) {
    $itemId = $_POST['item-id'];

    
    $message = "";

    $query = "DELETE FROM `items` WHERE id=:id";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':id', $itemId);

    if($stmt->execute()) {
      $message = "3";
      header('Location: index.php?message=' . $message);
    } else {
      print_r($stmt->errorInfo());
    }
  }