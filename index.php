<?php include 'config/db.php'; ?>
<?php 
  $message = $_GET['message'];

  $query = 'SELECT * FROM items';
  $stmt = $dbh->prepare($query);
  $stmt->execute();

  $items = $stmt->fetchAll(PDO::FETCH_OBJ);

  if(!$items) {
    print_r($dbh->errorInfo());
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/style.css">
    
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">PHP (PDO) CRUD APP</a>
    </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <!-- Button trigger modal -->
            <a class="btn btn-default" href="index.php">
              Home
            </a>
          </li>
          <li class="nav-item">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal1">
                Add Item
              </button>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      
            <!-- Modal 1 for Add Item-->
                      <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="create.php">
                                <div class="form-group">
                                  <label>Item's Name</label>
                                  <input name="item-name" type="text" class="form-control" placeholder="Item's Name">
                                </div>
                                <div class="form-group">
                                  <label>Price</label>
                                  <input name="item-price" type="text" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                  <label>Stock</label>
                                  <input name="item-stock" type="text" class="form-control" placeholder="Stock">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
          <!-- Modal 2 for Update items -->
                    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="edit.php" method="POST">
                                <input type="hidden" name="item-id" id="itemId">
                                <div class="form-group">
                                  <label>Item's Name</label>
                                  <input name="item-name" id="itemName" type="text" class="form-control" placeholder="Item's Name">
                                </div>
                                <div class="form-group">
                                  <label>Price</label>
                                  <input name="item-price" id="itemPrice" type="text" class="form-control" placeholder="Price">
                                </div>
                                <div class="form-group">
                                  <label>Stock</label>
                                  <input name="item-stock" id="itemStock" type="text" class="form-control" placeholder="Stock">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
          <!-- Modal 3 for Delete item -->
                      <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="delete.php" method="POST">
                                <input type="hidden" name="item-id" id="deleteId">
                                
                                <h3>Are You Sure?</h3>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                  <button type="submit" name="delete-item" class="btn btn-danger">YES</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
      <!-- Home Page Items -->
      <div>
        <h1 class="text-center">Products</h1>
        <?php if($message==1) : ?>
        <div class="alert alert-success">Item has been created successfully.</div>
        <?php endif; ?>
        <?php if($message==2) : ?>
        <div class="alert alert-success">Item has been Updated</div>
        <?php endif; ?>
        <?php if($message==3) : ?>
        <div class="alert alert-danger">Item has been Deleted</div>
        <?php endif; ?>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Product Name</th>
              <th>Price(USD)</th>
              <th>Stock</th>
              <th colspan="2" class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($items as $item) : ?>
              <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->price; ?></td>
                <td><?php echo $item->stock; ?></td>
                <td class="text-right">
                  <button type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#exampleModal2">Edit</button>
                </td>
                <td>
                  <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#exampleModal2">Delete</button>
                </td>
              </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function() {
        //============ Update Script =======
        $('.edit-btn').on('click', function() {

          $('#editmodal').modal('show');

          $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function() {
            return $(this).text();
          }).get();

          console.log(data);

          $('#itemId').val(data[0]);
          $('#itemName').val(data[1]);
          $('#itemPrice').val(data[2]);
          $('#itemStock').val(data[3]);

        });
        //============ Delete Script =======
        $('.delete-btn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

        });
      });
    </script>
  </body>
</html>
