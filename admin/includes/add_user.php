<?php
  // create a new user
  if(isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_role = $_POST['user_role'];

    // $user_image = $_FILES['image']['name'];
    // $user_image_temp = $_FILES['image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";

    $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}' )";

    $create_user_query = mysqli_query($connection, $query);
    confirm($create_user_query);
  }

?>
<h1>Add a New User</h1>
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>

  <!-- 从已存在的categories中选择类型 -->
  <div class="form-group">
    <select name="user_role" id="">
      <?php
          // get user role categories
          $query = "SELECT * FROM users";
          $select_users = mysqli_query($connection, $query);
          confirm($select_users);
          while ($row = mysqli_fetch_assoc($select_users)):
            $user_id = $row['user_id'];
            $user_role = $row['user_role'];
            echo "<option vlaue='$user_id'>{$user_role}</option>";
          endwhile;
      ?>
    </select>
    <label>User Category</label>
  </div>

  <div class="form-group">
    <label for="author">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>

  <div class="form-group">
    <label for="post_status">Username</label>
    <input type="text" class="form-control" name="username">
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div> -->

  <div class="form-group">
    <label for="post_tags">Email</label>
    <input type="email" class="form-control" name="user_email">
  </div>

  <div class="form-group">
    <label for="post_tags">Password</label>
    <input type="password" class="form-control" name="user_password">
  </div>



  <button type="submit" class="btn btn-default" name="create_user">Add User</button>
</form>
