<?php require_once('../../../private/intialize.php') ?>
<?php
//$id = $_GET['id']??'1';//PHP7.0 onwards
$id = isset($_GET['id']) ? $_GET['id'] : '1'; //for PHP < 7.0 ?>
<?php $page_title="Show subjects"; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>


<div class="" id="content">
  <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to list</a>
  <div class="page show">
    Subject ID: <?php echo h($id); ?>
  </div>
</div>

<?php include(SHARED_PATH.'/staff_footer.php') ?>
