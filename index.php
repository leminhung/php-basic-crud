<?php
require_once 'config.php';
require_once 'process.php';
require_once 'test.php';
// Khi thiết lập những require ở trên thì các câu lệnh sẽ luôn được load đầu tiên khi mỗi lần click :))
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <?php
  if (isset($_SESSION['message'])) :
  ?>
    <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>

  <div class="container">
    <?php
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Location</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()) :
        ?>
          <tr>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['location'] ?></td>
            <td>
              <a href="index.php?edit=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a>
              <a href="process.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>

      </table>
    </div>

    <!-- <?php
          function pre_r($array)
          {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
          }
          ?> -->

    <div class="row justify-content-center">
      <form action="process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label>Location</label>
          <input type="text" name="location" value="<?php echo $location; ?>" class=" form-control" placeholder="Enter your location">
        </div>
        <div class="form-group">
          <?php if ($update == true) : ?>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
          <?php else : ?>
            <button type="submit" class="btn btn-primary" name="save">Save</button>
          <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
</body>

</html>