<!-- view all posts panel page -->
<h1>Welcome to view all comments</h1>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Author</th>
      <th>Content</th>
      <th>Email</th>
      <th>Status</th>
      <th>In Response to</th>
      <th>Date</th>
      <th>Approve</th>
      <th>Unapprove</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      // query all posts and display
      $query = "SELECT * FROM comments";
      $select_comments = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($select_comments)):
        $comment_id = $row['comment_id'];
        $comment_author = $row['comment_author'];
        $comment_post_id = $row['comment_post_id'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_content = $row['comment_content'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>$comment_id </td>";
        echo "<td>$comment_author</td>";
        echo "<td>$comment_content</td>";
        echo "<td>$comment_email</td>";

        // 将 post 中 category_id 换为 categories 表中的名称
        // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
        // $select_categories_id = mysqli_query($connection, $query);
        // confirm($select_categories_id);
        // while ($row = mysqli_fetch_assoc($select_categories_id)):
        //   $cat_id = $row['cat_id'];
        //   $cat_title = $row['cat_title'];
        //   // TODO 判断，当 这个 post关联的 category 不存在时？？？？？？
        //   echo "<td>$cat_title</td>";
        // endwhile;

        echo "<td>$comment_status</td>";

        // 可以转到post详情页面
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_post_id_query)):
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        endwhile;

        echo "<td>$comment_date</td>";
        echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
        echo "<td><a href='comments.php?delete={$comment_id}'>Delete</a></td>";
        echo "</tr>";
      endwhile;

    ?>
  </tbody>
</table>

<?php

  // change approve and unapprove status
  if(isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approve_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
  }
  if(isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
  }

  // delete post
  if(isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
  }

?>