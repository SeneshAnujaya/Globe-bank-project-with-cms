<?php require_once('../../../private/functions.php'); ?>
<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<link rel="stylesheet" href="../../stylesheets/staff.css">

<?php 
    $id = $_GET['id'] ?? '1';

    $subject = find_subject_by_id($id);
    $pages_list = find_pages_by_subject_id($id);
?>

<?php $page_title = "Show Subjects"; ?>
<?php include('../../../private/shared/staff_header.php'); ?>

<div id="content">
    
    <a class="back-link" href="<?php echo './index.php' ?>">&laquo; Back to List</a>

    <div class="subject show">

        <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

        <div class="attributes">
            <dl>
                <dt>Menu Name</dt>
                <dd><?php echo h($subject['menu_name']); ?></dd>
            </dl>
            <dl>
                <dt>Position</dt>
                <dd><?php echo h($subject['position']); ?></dd>
            </dl>
            <dl>
                <dt>Visible</dt>
                <dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
            </dl>
        </div>

        <hr />

  <!-- --------------------------------- -->
        <div class="pages listing">
    <h2>Pages</h2>

    <div class="actions">
      <a class="action" href="<?php echo '../pages/new.php?subject_id='. h(u($subject['id'])) ?>">Create New Page</a>
    </div>

    <table class="list">
  	  <tr>
        <th>ID</th>
        <!-- <th>Subject ID</th> -->
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>
      
      <?php while($page = mysqli_fetch_assoc($pages_list)) { ?>
          <?php $subject = find_subject_by_id($page['subject_id']); ?>
        <tr>
     
          <td><?php echo h($page['id']); ?></td>
          <!-- <td><?php echo $subject['menu_name'] ?></td> -->
          <td><?php echo h($page['position']); ?></td>
          <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo h($page['menu_name']); ?></td>
          <td><a class="action" href="<?php echo '../pages/show.php?id=' . h(u($page['id'])); ?>">View</a></td>
          <td><a class="action" href="<?php echo '../pages/edit.php?id=' . h(u($page['id'])); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo '../pages/delete.php?id=' . h(u($page['id'])); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>

  	</table>

    
    <?php
      mysqli_free_result($pages_list)
    ?>

    </div>

    </div>
</div>

<?php include('../../../private/shared/staff_footer.php'); ?>
