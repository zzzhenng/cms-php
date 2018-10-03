<?php
  // edit post and display old post data
  if(isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

  }
  // grap old data to display
  $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
  $select_posts_by_id = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_posts_by_id)):
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_content = $row['post_content'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
  endwhile;

  //  update post
  if (isset($_POST['update_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category = $_POST['post_category'];

    // 插入新的post时，把提交的category 从表中查到其 ID，储存到post表中
    $query_post_id = "SELECT cat_id FROM categories ";
    $query_post_id .= "WHERE cat_title = '$post_category' ";
    $result = mysqli_query($connection,$query_post_id);
    confirm($result);
    if($row = mysqli_fetch_array($result)) {
      echo $post_category_id = $row[0];
    } else {
      $post_category_id = 000000;
    }

    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image)) {
      $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
      $select_image = mysqli_query($connection, $query);

      while($row = mysqli_fetch_array($select_image)) {
        $post_image = $row['post_image'];
      }
    }


    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_category_id = {$post_category_id}, ";
    $query .= "post_date = now(), ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content}', ";
    $query .= "post_image = '{$post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";

    $query_post = mysqli_query($connection,$query);
    confirm($query_post);
  }
?>

<h1>Edit Post</h1>
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="post_title">
  </div>

  <div class="form-group">

    <select name="post_category" id="">
      <?php
          // get category title
          $query = "SELECT * FROM categories";
          $query_categories = mysqli_query($connection, $query);
          confirm($query_categories);
          while ($row = mysqli_fetch_assoc($query_categories)):
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<option vlaue='$cat_id'>{$cat_title}</option>";
          endwhile;
      ?>
    </select>
    <label>Post Category</label>

  </div>

  <div class="form-group">
    <label for="author">Post Author</label>
    <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
  </div>

  <div class="form-group">
    <label for="post_status">Post Status</label>
    <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <img width="100" src="../images/<?php echo $post_image; ?>" alt="image">
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea  class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
  </div>

  <button type="submit" class="btn btn-default" name="update_post">Update Post</button>
</form>
