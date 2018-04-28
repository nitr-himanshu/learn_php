<?php require_once('../../../private/intialize.php') ?>
<?php
//$id = $_GET['id']??'1';//PHP7.0 onwards
require_login();

$id = isset($_GET['id']) ? $_GET['id'] : '1'; //for PHP < 7.0
$page=find_page_by_id($id);
$subject=find_subject_by_id($page['subject_id']);
 ?>
<?php $page_title="Show page"; ?>
<?php include(SHARED_PATH.'/staff_header.php'); ?>


<div class="" id="content">
  <a href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to list</a>
  <div class="page show">
    <h1> Page: <?php echo h($page['menu_name']); ?> </h1>
    <div class="actions">
        <a href="<?php echo url_for('/index.php?id='.h(u($page['id'])).'&preview=true')?>" target="_blank">Preview</a>
    </div>


    <div class="attributes">
      <dl>
        <dt>Menu Name</dt>
        <dd> <?php echo h($page['menu_name']); ?> </dd>
      </dl>
      <dl>
        <dt>Subject</dt>
        <dd> <?php echo h($subject['menu_name']); ?> </dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd> <?php echo h($page['position']); ?> </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd> <?php echo $page['visible']=='1'?'true':'false'; ?> </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd> <?php echo $page['content']; ?> </dd>
      </dl>
    </div>
  </div>
</div>

<?php include(SHARED_PATH.'/staff_footer.php') ?>
