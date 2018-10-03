<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <!-- 从 posts 表中提取所有数据，显示中央列表 -->
        <?php

          $query = "SELECT * FROM posts";
          $select_all_posts_query = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($select_all_posts_query)):
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'], 0, 100);

        ?>

            <h1>Page Heading <small>Secondary Text</small></h1>
            <hr>
            <h2><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h2>
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

      </div><!-- end col-md-8 -->

      <!-- 右边 search bar -->
      <?php include "includes/sidebar.php" ?>

    </div>
  </div><!-- end container -->



<?php include "includes/footer.php"; ?>





