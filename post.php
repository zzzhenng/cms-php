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
      // display selected post detail
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


      <?php
        if(isset($_POST['create_comment'])) {
          $the_post_id = $_GET['p_id'];
          $comment_author = $_POST['comment_author'];
          $comment_email = $_POST['comment_email'];
          $comment_content = $_POST['comment_content'];

          $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date)";
          $query .= "VALUES ($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unappraoved', now())";

          $create_comment_query = mysqli_query($connection, $query);
          if(!$create_comment_query) {
            die('error' . mysqli_error($connection));
          }

          $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
          $query .= "WHERE post_id = $the_post_id";
          $update_comment_count = mysqli_query($connection,$query);
        }

      ?>
      <!-- 写留言 -->
      <div class="form-group bg-info" style="padding: 1rem;">
        <form method="post">
        <div class="form-group">
          <label for="Author">Author</label>
          <input type="text" name="comment_author" class="form-control">
        </div>
        <div class="form-group">
          <label for="Email">Email</label>
          <input type="email" class="form-control" name="comment_email">
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">留言</label>
          <textarea name="comment_content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button name="create_comment" class="btn btn-success" type="submit">Submit</button>
        </form>
      </div>

      <hr>

      <!-- 留言展示 -->

        <?php
          $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
          $query .= "AND comment_status = 'approved' ";
          $query .= "ORDER BY comment_id DESC";
          $select_comment_query = mysqli_query($connection, $query);
          if(!$select_comment_query) {
            die('error' . mysqli_error($connection));
          }
          while($row = mysqli_fetch_array($select_comment_query)):
            $comment_date = $row['comment_date'];
            $comment_content = $row['comment_content'];
            $comment_author = $row['comment_author'];
          ?>
            <div class="card border-success mb-3" style="max-width: 28rem;">
              <div class="card-header"><?php echo $comment_date ?></div>
              <div class="card-body text-success">
                <h5 class="card-title"><?php echo $comment_author ?></h5>
                <p class="card-text"><?php echo $comment_content ?></p>
              </div>
            </div>
          <?php endwhile; ?>


    <?php endwhile; ?>

    </div><!-- end col-md-8 -->

      <!-- 右边 search bar -->
      <?php include "includes/sidebar.php" ?>

    </div>
  </div><!-- end container -->




<?php include "includes/footer.php"; ?>
