<!-- view all posts panel page -->
<h1>Welcome to view all posts</h1>

<?php
    // 利用 checkbox 批量更新表中数据的状态
    if(isset($_POST['checkBoxArray'])){
      echo "2345345234";
      foreach($_POST['checkBoxArray'] as $postValueId) {

        $bulk_options = $_POST['bulk_options'];
        switch($bulk_options) {
          case 'published':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
            $update_to_published_status = mysqli_query($connection,$query);
            confirm($update_to_published_status);
            break;
          case 'draft':
            $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId}";
            $update_to_draft_status = mysqli_query($connection,$query);
            confirm($update_to_draft_status);
            break;
          case "delete":
            $query = "DELETE FROM posts WHERE post_id = {$postValueId}";
            $delete_selected_posts = mysqli_query($connection,$query);
            confirm($delete_selected_posts);
            break;
        }
      }
    }

?>


<form method="post" action="">
  <div class="col-xs-4">
    <select name="bulk_options" id="" class="form-control">
      <option value="">Select Options</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
      <option value="delete">Delete</option>
    </select>
  </div>
  <div class="col-xs-4">
    <button type="submit" name="apply" class="btn btn-success">Apply</button>
    <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
  </div>
<!-- </form> -->

<table class="table table-bordered">
  <thead>
    <tr>
      <th><input type="checkbox" id="selectAllBoxes"></th>
      <th>Id</th>
      <th>Author</th>
      <th>Title</th>
      <th>Category</th>
      <th>Status</th>
      <th>Image</th>
      <th>Tags</th>
      <th>Comments Count</th>
      <th>Date</th>
      <th>View Post</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // query all posts and display
      $query = "SELECT * FROM posts";
      $select_posts = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_posts)):
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];

        echo "<tr>";

        echo "<td><input class='checkBox' type='checkbox' name='checkBoxArray[]' value='$post_id'></td>";

        echo "<td>$post_id</td>";
        echo "<td>$post_author</td>";
        echo "<td>$post_title</td>";

        // 将 post 中 category_id 换为 categories 表中的名称
        $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        $select_categories_id = mysqli_query($connection, $query);
        confirm($select_categories_id);
        while ($row = mysqli_fetch_assoc($select_categories_id)):
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          // TODO 判断，当 这个 post关联的 category 不存在时？？？？？？
          echo "<td>$cat_title</td>";
        endwhile;


        echo "<td>$post_status</td>";
        echo "<td><img width='100' src='../images/$post_image' alt='image' ></td>";
        echo "<td>$post_tags</td>";

        // 连接表 comments 查出这个post的评论个数
        $query = "SELECT COUNT(comment_post_id) FROM comments WHERE comment_post_id = $post_id ";
        $query .= "GROUP BY comment_post_id";
        $post_comment_count_query = mysqli_query($connection,$query);
        confirm($post_comment_count_query);
        if ($row = mysqli_fetch_array($post_comment_count_query,MYSQLI_NUM)) {
          echo "<td>$row[0]</td>";
        } else {
          echo "<td>0</td>";
        }

        echo "<td>$post_date</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
      endwhile;

    ?>
  </tbody>
</table>

</form><!-- end form -->

<?php
  // delete post
  if(isset($_GET['delete'])) {
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
  }

?>