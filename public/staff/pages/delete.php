<?php 



require_once('../../../private/initialize.php');
require_once('../../../private/functions.php'); 

require_login(); 

if (!isset($_GET['id'])) {
    redirect_to('./index.php');
}

$id = $_GET['id'];

$page = find_page_by_id($id);

if (is_post_request()) {

    $result = delete_page($id);
    $_SESSION['message'] = 'The page was deleted successfully';
    redirect_to('../subjects/show.php?id='.h(u($page['subject_id'])));
    
} 

?>

<?php $page_title = 'Delete Page'; ?>
<?php include('../../../private/shared/staff_header.php'); ?>
<link rel="stylesheet" href="../../stylesheets/staff.css">

<div id="content">

<a class="back-link" href="<?php echo '../subjects/show.php?id=' . h(u($page['subject_id'])); ?>">&laquo; Back to List</a>

  <div class="page delete">
    <h1>Delete Page</h1>
    <p>Are you sure you want to delete this page?</p>
    <p class="item"><?php echo h($page['menu_name']); ?></p>

    <form action="<?php echo './delete.php?id=' . h(u($page['id'])); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Page" />
      </div>
    </form>
  </div>

</div>

<?php include('../../../private/shared/staff_footer.php'); ?>

