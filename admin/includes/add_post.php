<?php
  // create a new post
  if(isset($_POST['create_post'])) {

    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    // 将这个post的类型外联 categories 表找到 id 存储到 posts 表中
    $query_post_category_id = "SELECT cat_id from categories WHERE cat_title = '{$post_category}' ";
    $query_post_category_id_result = mysqli_query($connection,$query_post_category_id);
    while($row = mysqli_fetch_array($query_post_category_id_result)) {
      $post_category_id = $row[0];
    }

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags,  post_status) ";

    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}' )";

    $create_post_query = mysqli_query($connection, $query);
    confirm($create_post_query);
  }

?>
<h1>Add a New Post</h1>
<form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>

  <!-- 从已存在的categories中选择类型 -->
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
    <input type="text" class="form-control" name="author">
  </div>

  <div class="form-group">
    <select name="post_status" id="">
          <option value="">Post Status</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" class="form-control" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
  </div>

  <div class="form-group">
    <label for="post_content">Post Content</label>
    <textarea  class="form-control" name="post_content" cols="30" row="10"></textarea>
  </div>

  <button type="submit" class="btn btn-default" name="create_post">Submit</button>
</form>
