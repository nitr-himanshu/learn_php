<?php require_once('../../../private/intialize.php');?>
<?php
require_login();

if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/subjects/index.php"));
}
$id=$_GET["id"];
$subject=find_subject_by_id($id);

if(is_post_request()){
extract($_POST);
$result=delete_subject($id);
$_SESSION['message']='The subject was deleted successfully';
redirect_to(url_for("/staff/subjects/index.php"));
}

$page_title="Delete Subjects";
include(SHARED_PATH.'/staff_header.php');
 ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Delete Subjects</h1>
  <p>
    Are you sure you want to delete this subject?
  </p>
  <p class="item">
    <?php echo h($subject['menu_name']); ?>
  </p>
  <form class="" action="" method="post">
    <input type="submit" name="commit" value="Delete Subject" />
  </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
