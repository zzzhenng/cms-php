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
  <h1>Update data from Database</h1>
  <html>
  <header>

  </header>
</html>
<body>
  <form action="login.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br />
    <label for="password">Password:</label>
    <input type="password" name="password">
    <br />
    <button type="submit" name="submit">Submit</button>
  </form>
</body>


</body>
