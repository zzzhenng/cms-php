<?php
  include "db.php";

  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users(username,password)";
    $query .= "VALUES ('$username', '$password')";

    // mysqli_qeury(link, query) 对数据库执行一次查询
    $result = mysqli_query($connection, $query);

    if(!$result) {
      die("Query Failed" . mysqli_error());
    }
  }
?>

<html>
  <header>

  </header>
</html>
<body>
  <h1>Create a User</h1>
  <form action="login_create.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username">
    <br />
    <label for="password">Password:</label>
    <input type="password" name="password">
    <br />
    <button type="submit" name="submit">Submit</button>
  </form>
</body>