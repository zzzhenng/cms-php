<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>



  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <!-- 从 posts表中的 post_tags 一栏中查询用户输入的内容，如果有，则返回这些 posts，否则返回空 -->
        <?php

          if (isset($_POST['submit'])) {
            $search = $_POST['search'];
            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
            $search_query = mysqli_query($connection, $query);

            if (!$search_query) {
              die("query failed" . mysqli_error());
            }

            $count = mysqli_num_rows($search_query);
            if ($count === 0) {
              // 没有找到 post_tags 中包含用户输入的内容，则返回 No Result
              echo "<h1 style='color: red'>No Result here</h1>";
            } else {
              // 从 post_tags 中找到了包含用户输入的内容，加载
              while($row = mysqli_fetch_assoc($search_query)):
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

        ?>

            <h1>Page Heading <small>Secondary Text</small></h1>
            <hr>
            <h2><a href=""><?php echo $post_title ?></a></h2>
            <p class="lead">
              by <a href="index.php"><?php echo $post_author ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"><?php echo $post_date ?></span></p>
            <hr>
            <img src="images/<?php echo $post_image ?>" alt="image">
            <hr>
            <p><?php echo $post_content ?></p>
            <a href="" class="btn btn-primary">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>

            <?php endwhile; ?>
         <?php } } ?>
      </div><!-- end col-md-8 -->

      <!-- 右边 search bar -->
      <?php include "includes/sidebar.php" ?>

    </div>
  </div>




<?php include "includes/footer.php"; ?>





