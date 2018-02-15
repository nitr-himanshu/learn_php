<?php require_once('../../../private/intialize.php');
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
$page_title="Create Pages";
include(SHARED_PATH.'/staff_header.php');
?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Create Pages</h1>
  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>'
      <dd> <input type="text" name="menu_name" value="<?php echo h($menu_name);?>"> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd> <select class="" name="position">
        <option value="1" <?php if($position=="1"){echo "Selected";} ?> >1</option>
      </select> </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" <?php if($visible=="1"){ echo "Checked";} ?> >
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Create Pages">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
