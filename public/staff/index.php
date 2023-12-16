<?php require_once('../../private/initialize.php'); ?>
<?php require_once('../../private/functions.php'); ?>

<?php require_login(); ?>

<?php $page_title = "Staff Menu"; ?>

<?php 
include('../../private/shared/staff_header.php'); ?>

    <div id="content">
      <div id="main-menu">
        <h2>Main Menu</h2>
        <ul>
          <li><a href="subjects/index.php">Subjects</a></li>
      
          <li><a href="admins/index.php">Admins</a></li>
        </ul>
      </div>
    </div>

  <?php include('../../private/shared/staff_footer.php'); ?>
 
  </body>
</html>
