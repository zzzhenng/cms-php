
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/cms-php">HOME SITE</a></li>

       <li><a href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['username'] ?></a></li>


      <li><a href="../includes/logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
    </ul>
  </div>
</nav>

<div>
  <div class="row">
    <!-- 左边列表 -->
    <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="#collapse1" class="dropdown-toggle" data-toggle="collapse">Posts<span class="caret"></span></a></li>
            <div class="collapse" id="collapse1" style="width: 80%; margin: auto;" >
              <ul class="list-group">
                <li class="list-group-item"><a href="./posts.php">VIew All Posts</a></li>
                <li class="list-group-item"><a href="posts.php?source=add_post">Add Posts</a></li>
              </ul>
            </div>
          <li><a href="./categories.php">Categories</a></li>
          <li><a href="./comments.php">Comments</a></li>
          <li><a href="#collapse2" class="dropdown-toggle" data-toggle="collapse">Users<span class="caret"></span></a></li>
            <div class="collapse" id="collapse2" style="width: 80%; margin: auto;" >
              <ul class="list-group">
                <li class="list-group-item"><a href="./users.php">VIew All users</a></li>
                <li class="list-group-item"><a href="users.php?source=add_user">Add User</a></li>
              </ul>
            </div>
          <li><a href="./profile.php">Profile</a></li>
      </ul>

    </div><!-- end col-3 -->

  <!-- </div>
</div> -->
