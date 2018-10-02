<?php include "includes/admin_header.php" ?>

<?php include "includes/admin_navigation.php" ?>
<!-- nav bar -->
<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CMS Admin</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/cms">HOME SITE</a></li>
      <li><a href="#" ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav> -->


<!-- <div class="container-fluid">
  <div class="row"> -->

    <!-- 左边列表 -->
    <!-- <div class="col-md-3">
      <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#">Dashboard</a></li>
          <li><a href="#collapse1" class="dropdown-toggle" data-toggle="collapse">Posts<span class="caret"></span></a></li>
            <div class="collapse" id="collapse1" style="width: 80%; margin: auto;" >
              <ul class="list-group">
                <li class="list-group-item"><a href="posts.php">VIew All Posts</a></li>
                <li class="list-group-item"><a>Add Posts</a></li>
              </ul>
            </div>
          <li><a href="categories.php">Categories</a></li>
          <li><a href="#">Comments</a></li>
          <li><a href="#">Users</a></li>
          <li><a href="#">PRofile</a></li>
      </ul>

    </div>end col-3 -->

    <!-- 右边列表 -->
    <div class="col-md-9">
      <div class="container">
        <div class="row">
          <div class="col-md-12"><h1>Welcome to admin</h1></div>
        </div>

        <div class="row">
          <!-- 中间插入新类型 -->
          <div class="col-md-5">

            <?php insert_categories(); ?>

            <form action="" method="post">
              <div class="form-group">
              <label for="cat-title">Add Category</label>
                <input class="form-control" name="cat_title" type="text">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Add Category" >
              </div>
            </form>

            <?php
              // update categories
              if(isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                include "includes/update_categories.php";
              }
            ?>
          </div><!-- end col-5 -->

          <!-- 右边从表 categories 中读取所有的类型显示 -->
          <div class="col-md-5">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <td>Id</td>
                  <td>Category Title</td>
                </tr>
              </thead>
              <tbody>

                <?php deleteCategories(); ?>

                <?php findAllCategories(); ?>

              </tbody>
            </table>
          </div><!-- end col-5 -->
        </div>
      </div>

    </div><!-- end col-9 -->


  </div>
</div>





<?php include "includes/admin_footer.php" ?>