<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <a class="nav-item nav-link active" href="./index.php">CMS Home<span class="sr-only">(current)</span></a>

    <!-- 从categories表中提取数据，显示在 nvabar -->
    <?php
      $query = "SELECT * FROM categories";
      $select_all_categories_query = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_all_categories_query)):
        $cat_title = $row['cat_title'];
        echo "<a class='nav-item nav-link' href='#'>{$cat_title}</a>";

      endwhile;
    ?>

    <a href="admin" class="nav-item nav-link">admin</a>

    </div>
  </div>
  <ul class="nav justify-content-end">
      <li class="nav-item">
        <a href="registration.php" class="nav-link">register</a>
      </li>

    </ul>
</nav>