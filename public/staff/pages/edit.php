<?php require_once('../../../private/intialize.php');?>
<?php
if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/pages/index.php"));
}

$id=$_GET['id'];
$page = find_page_by_id($id);
$pages_count=find_no_of_pages($id);
$subject_set=find_all_subjects();

if(is_post_request()){
extract($_POST);
$pages=[];
$pages['id']=$id;
$pages['subject_id']=$subject_id;
$pages['menu_name']=$menu_name;
$pages['position']=$position;
$pages['visible']=$visible;
$pages['content']=$content;
$result=update_page($pages);
redirect_to(url_for("/staff/pages/show.php?id=".$id));
}
 ?>

 <?php $page_title="Edit Pages";
 include(SHARED_PATH.'/staff_header.php');
  ?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Edit Pages</h1>
  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>
      <dd> <input type="text" name="menu_name" value="<?php echo h($page['menu_name']);?>"> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd> <select class="" name="position">
        <?php
        for ($i=1;$i<=$pages_count;$i++){
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
      <dt>Subject</dt>
      <dd>
        <select name="subject_id">
          <?php while($subject=mysqli_fetch_assoc($subject_set)){ ?>
              <option value="<?php echo h($subject['id']);?>"
                <?php if($page['subject_id']==$subject['id']) echo " selected"; ?>
                >
                  <?php echo h($subject['menu_name']); ?>
              </option>
          <?php } ?>
      </select>
    </dd>
    </dl>
    <dl>
      <dt>Visible</dt>
      <dd>
        <input type="hidden" name="visible" value="0">
        <input type="checkbox" name="visible" value="1"
        <?php if($page['visible']=="1"){ echo " checked";} ?>>
      </dd>
    </dl>
    <dl>
      <dt>Content</dt>
      <dd>
        <input type="textbox" name="content"  value="<?php echo h($page['content']);?>"/>
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Edit Subject">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
