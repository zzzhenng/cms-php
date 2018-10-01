<?php
    include "db.php";

    $query = "SELECT * FROM users";

    // mysqli_qeury(link, query) 对数据库执行一次查询
    $result = mysqli_query($connection, $query);

    if(!$result) {
      die("Query Failed" . mysqli_error());
    }
?>

<html>
  <header></header>
</html>
<body>
  <h1>Read data from Database</h1>
  <!-- mysqli_fetch_assoc() -->
  <!-- muysqli_fetch_row() -->
  <?php
    while($row = mysqli_fetch_assoc($result)):
  ?>
    <pre>

      <?php print_r($row) ?>
    </pre>

    <?php endwhile; ?>

</body>
