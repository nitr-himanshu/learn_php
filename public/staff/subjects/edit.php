<?php require_once('../../../private/intialize.php');?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/subjects/index.php"));
}
$id=$_GET["id"];

if(is_post_request()){
extract($_POST);
$subject=[];
$subject['id']=$id;
$subject['menu_name']=$menu_name;
$subject['position']=$position;
$subject['visible']=$visible;
$result=update_subject($subject);
redirect_to(url_for("/staff/subjects/show.php?id=".$id));
}
else{
  $subject=find_subject_by_id($id);
  $subject_count=find_no_of_subject();
}

$page_title="Edit Subjects";
include(SHARED_PATH.'/staff_header.php');
 ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Edit Subjects</h1>
  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>'
      <dd> <input type="text" name="menu_name" value="<?php echo h($subject['menu_name']);?>"> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd>
        <select class="" name="position">
          <?php
          for ($i=1;$i<=$subject_count;$i++){
            echo "<option value=\"{$i}\"";
            if($subject["position"]==$i){
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
        <input type="checkbox" name="visible" value="1" ><?php if($subject['visible']=="1"){ echo " Checked";} ?>
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Edit Subject">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
