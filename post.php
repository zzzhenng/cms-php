<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


<div class="container">
  <div class="row">
    <div class="col-md-8">

    <?php
      if(isset($_GET['p_id'])) {
        $the_post_id = $_GET['p_id'];
      }

      $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
      $select_all_posts_query = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_all_posts_query)):
        $post_title = $row['post_title'];
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
    ?>

      <h1><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a></h1>
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

      <div class="form-group bg-info" style="padding: 1rem;">
        <label for="exampleFormControlTextarea1">留言</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        <button class="btn btn-success" type="submit">Submit</button>
      </div>

      <hr>

      <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Header</div>
        <div class="card-body text-success">
          <h5 class="card-title">Success card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    <?php endwhile; ?>

    </div><!-- end col-md-8 -->

      <!-- 右边 search bar -->
      <?php include "includes/sidebar.php" ?>

    </div>
  </div><!-- end container -->




<?php include "includes/footer.php"; ?>
