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
          case 'add_user':
            include "includes/add_user.php";
            break;
          case 'edit_user':
            include "includes/edit_user.php";
            break;
          default:
            include "includes/view_all_users.php";
            break;
        }

      ?>
    </div>

  </div>
</div>
<?php include "includes/admin_footer.php" ?>