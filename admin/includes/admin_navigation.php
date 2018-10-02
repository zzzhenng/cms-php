
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">CMS Admin</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/cms">HOME SITE</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
          <li><a href="#">Comments</a></li>
          <li><a href="#">Users</a></li>
          <li><a href="#">PRofile</a></li>
      </ul>

    </div><!-- end col-3 -->

  <!-- </div>
</div> -->
