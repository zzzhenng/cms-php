<?php include "includes/admin_header.php" ?>

<?php include "includes/admin_navigation.php" ?>

    <div class="col-md-8">

      <?php
        if(isset($_GET['source'])) {
          $source = $_GET['source'];
        } else {
          $source = '';
        }

        switch($source) {
          case 'add_post':
            include "includes/add_post.php";
            break;
          case 'edit_post':
            include "includes/edit_comments.php";
            break;
          default:
            include "includes/view_all_comments.php";
            break;
        }

      ?>
    </div>

  </div>
</div>
<?php include "includes/admin_footer.php" ?>