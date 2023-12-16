<?php require_once('../../../private/functions.php'); ?>
<?php require_once('../../../private/initialize.php'); ?>

<?php 

 require_login(); 

if(!isset($_GET['id'])) {
    redirect_to('./index.php');
}

$id = $_GET['id'];

if(is_post_request()) {

    $result = delete_admin($id);
    $_SESSION['message'] = 'Admin deleted.';
    redirect_to('./index.php');

} else {
  $admin = find_admin_by_id($id);
}

?>

<link rel="stylesheet" href="../../stylesheets/staff.css" />

<?php $page_title = 'Delete Admin'; ?>
<?php include('../../../private/shared/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo './index.php'; ?>"
    >&laquo; Back to List</a
  >

  <div class="admin delete">
    <h1>Delete Admin</h1>
    <p>Are you sure you want to delete this admin?</p>
    <p class="item"><?php echo h($admin['username']); ?></p>

    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('./delete.php?id=' . h(u($admin['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Admin" />
      </div>
    </form>
  </div>
     


  </div>
</div>

<?php include('../../../private/shared/staff_footer.php'); ?>
