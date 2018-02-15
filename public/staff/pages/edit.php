<?php require_once('../../../private/intialize.php');
$page_title="Edit Pages";
include(SHARED_PATH.'/staff_header.php');
?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/pages/index.php"));
}
$menu_name="";
$position='';
$visible='';
if(is_post_request()){
extract($_POST);
echo "Form parameter<br />";
echo "Menu Name ".$menu_name."<br/>";
echo "Position ".$position."<br/>";
echo "Visible ".$visible."<br/>";
}
 ?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Edit Pages</h1>
  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>
      <dd> <input type="text" name="menu_name" value="<?php echo h($menu_name);?>"> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd> <select class="" name="position">
        <option value="1">1  <?php if($position=="1"){echo " Selected";} ?> </option>
      </select> </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1">
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Edit Subject">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
