<?php require_once('../../../private/functions.php'); ?>
<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>


<link rel="stylesheet" href="../../stylesheets/staff.css">

<?php


$subject_set = find_all_subjects();


  // $subjects = [
  //   ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
  //   ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
  //   ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
  //   ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
  // ];
?>

<?php $page_title = "Subjects"; ?>
<?php include('../../../private/shared/staff_header.php'); ?>



    <div id="content">
    <div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="<?php echo './new.php' ?>">Create New Subject</a>
    </div>

    <table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
        <th>pages</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php while($subject = mysqli_fetch_assoc($subject_set)) { ?>
        <?php $page_count = count_pages_by_subject_id($subject['id']); ?>
        <tr>
          <td><?php echo $subject['id']; ?></td>
          <td><?php echo $subject['position']; ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo $subject['menu_name']; ?></td>
          <td><?php echo $page_count ?></td>
          <td><a class="action" href="<?php echo './show.php?id=' . $subject['id']  ?>">View</a></td>
          <td><a class="action" href="<?php echo './edit.php?id=' . h(u($subject['id'])) ?>">Edit</a></td>
          <td><a class="action" href="<?php echo './delete.php?id=' . h(u($subject['id'])) ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php
      mysqli_free_result($subject_set)
    ?>

    </div>
    </div>

  <?php include('../../../private/shared/staff_footer.php'); ?>
 
  </body>
</html>