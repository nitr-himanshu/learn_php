<?php require_once('../../../private/intialize.php');
$page_count=find_no_of_pages();
$page=[];
$page['menu_name']='';
$page['visible']='';
$page['position']=$page_count;
if(is_post_request()){
extract($_POST);
$page=[];
$page['menu_name']=$menu_name;
$page['position']=$position;
$page['visible']=$visible;
$result=insert_page($page);
$new_id=mysqli_insert_id($db);
redirect_to(url_for('/staff/pages/show.php?id='.$new_id));
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
      <dd> <input type="text" name="menu_name" value="<?php echo h($page['menu_name']);?>"> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd>
        <select class="" name="position">
          <?php
          for ($i=1;$i<=$page_count;$i++){
            echo "<option value=\"{$i}\"";
            if($page["position"]==$i){
              echo " selected";
            }
            echo ">{$i}</option>";
          }
           ?>
      </select>
    </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){ echo "Checked";} ?> >
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Create Pages">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
