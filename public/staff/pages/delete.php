<?php require_once('../../../private/intialize.php');?>
<?php
require_login();

if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/pages/index.php"));
}
$id=$_GET["id"];
$page=find_page_by_id($id);

if(is_post_request()){
extract($_POST);
$result=delete_page($id);
$_SESSION['message']='The page was deleted successfully';
redirect_to(url_for("/staff/pages/index.php"));
}

$page_title="Delete Page";
include(SHARED_PATH.'/staff_header.php');
 ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Delete Pages</h1>
  <p>
    Are you sure you want to delete this Page?
  </p>
  <p class="item">
    <?php echo h($page['menu_name']); ?>
  </p>
  <form class="" action="" method="post">
    <input type="submit" name="commit" value="Delete Page" />
  </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
