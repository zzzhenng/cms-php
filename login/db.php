<?php
  // connect database
  $connection = mysqli_connect('localhost', 'root', '', 'loginapp');

  if ($connection) {
    echo "we are connected";
  } else {
    die("Database connection failed");
  }

?>