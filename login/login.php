<?php
  if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // mysqli_connect() 连接数据库
    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');

    if ($connection) {
      echo "we are connected";
    } else {
      die("Database connection failed");
    }

  }
?>

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

