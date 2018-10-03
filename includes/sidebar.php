<div class="col-md-4">
  <div class="container">

    <!-- blog search -->
    <div class="card">
      <div class="card-header"><h4>Blog Search</h4></div>
      <div class="card-body">
        <form action="search.php"  method="post">
            <div class="form-group">
              <input  name="search" type="text" class="form-control" placeholder="Search Input">
            </div>
              <div class="form-group">
                <button name="submit" type="submit" class="btn btn-success">Search
                </button>
              </div>
          </form>
      </div>
    </div><!-- end search-->

    <!-- login -->
    <div class="card">
      <div class="card-header"><h4>Blog Login</h4></div>
      <div class="card-body">
        <form action="./includes/login.php"  method="post">
            <div class="form-group">
              <input  name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <input  name="password" type="password" class="form-control" placeholder="Enter password">
            </div>
            <div class="form-group">
              <button name="login" type="submit" class="btn btn-success">Login
              </button>
            </div>
          </form>
      </div>
    </div><!-- end login-->


    <!-- blog categories-->
    <div class="card">

      <?php
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection, $query);
      ?>

      <div class="card-header"><h4>Blog Categories</h4></div>
      <div class="card-body">
          <ul class="list-unstyled">

            <?php
              while($row = mysqli_fetch_assoc($select_categories_sidebar)):
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
              endwhile;
            ?>

          </ul>
      </div>
    </div><!-- end categories -->


    <?php include "widget.php"; ?>

  </div><!-- end container-->
</div>