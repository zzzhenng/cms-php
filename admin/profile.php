<?php include "includes/admin_header.php" ?>
<!-- TODO
     TODO
     TODO
     TODO
-->
<?php
  // display old user profile data
  if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
        $user_image = $row['user_image'];
    }
  }
?>

<?php
   // update user profile
   if(isset($_POST['update_profile'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_role = $_POST['user_role'];

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_role = '{$user_role}' ";
    $query .= "WHERE user_id = {$user_id}";

    $update_query = mysqli_query($connection,$query);
    confirm($update_query);
  }

?>


<?php include "includes/admin_navigation.php" ?>

    <div class="col-md-8">
      <h1>User Profile</h1>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="title">Firstname</label>
          <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
        </div>

        <!-- 从已存在的categories中选择类型 -->
        <div class="form-group">
          <select name="user_role" id="">
            <option value="subscriber"><?php echo $user_role; ?></option>
            <?php
                // get user role categories
                if ($user_role == 'admin') {
                  echo "<option value='subscriber' >Subscriber</option>";
                } else {
                  echo "<option value='admin'>Admin</option>";
                }
            ?>
          </select>
          <label>User Category</label>
        </div>

        <div class="form-group">
          <label for="author">Lastname</label>
          <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
        </div>

        <div class="form-group">
          <label for="post_status">Username</label>
          <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
        </div>

        <!-- <div class="form-group">
          <label for="post_image">Post Image</label>
          <input type="file" class="form-control" name="image">
        </div> -->

        <div class="form-group">
          <label for="post_tags">Email</label>
          <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
        </div>

        <div class="form-group">
          <label for="post_tags">Password</label>
          <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
        </div>



        <button type="submit" class="btn btn-default" name="update_profile">Update Profile</button>
      </form>

    </div>

  </div>
</div>
<?php include "includes/admin_footer.php" ?>