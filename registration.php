<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php
    // registration page
    if(isset($_POST['submit'])) {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if(!empty($password) && !empty($email) && !empty($username)) {

        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $password = password_hash($password, PASSWORD_DEFAULT);


        $query_user = "SELECT user_email from users ";
        $query_user .= "WHERE user_email = '{$email}'";
        $is_exist_user = mysqli_query($connection,$query_user);
        while($row = mysqli_fetch_array($is_exist_user)) {
          $exist_email = $row[0];
        }
        if(!empty($exist_email)) {
          echo "<h3 class='text-center'>Email is already registered, Please change your email Or login<h3>";
        } else {
          $message = "Successfully Register";
          $query = "INSERT INTO users(username, user_email, user_password) ";
          $query .= "VALUES('{$username}', '{$email}', '{$password}')";
          $insert_user = mysqli_query($connection,$query);
          if(!$insert_user) {
            die('field' . mysqli_error($connection));
          }
          header("Location: index.php");
        }
      } else {
         $message = "Fields cannot be empty";
      }

    }
?>


      <h1 style="text-align: center;">Register</h1>
      <!-- <h4 class="text-center"><?php echo $message or '' ?></h4> -->
      <form  action="" method="post" enctype="multipart/form-data" style="max-width: 450px; margin: auto; margin-top: 20px;">
        <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="username">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <!-- <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button name="submit" type="submit" class="btn btn-primary">Register</button>
      </form>






<?php include "includes/footer.php"; ?>





