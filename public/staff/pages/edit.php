<?php require_once('../../../private/intialize.php');?>
<?php
require_login();

if(!isset($_GET['id'])){
  redirect_to(url_for("/staff/pages/index.php"));
}

$id=$_GET['id'];
$pages_count=find_no_of_pages($id);
$subject_set=find_all_subjects();

if(is_post_request()){
  extract($_POST);
  $page=[];
  $page['id']=$id;
  $page['subject_id']=$subject_id;
  $page['menu_name']=$menu_name;
  $page['position']=$position;
  $page['visible']=$visible;
  $page['content']=h($content);
  $result=update_page($page);
  if($result === true){
    $_SESSION['message']='The page was udpated successfully';
    redirect_to(url_for('/staff/pages/show.php?id='.$id));
  }
  else{
    $errors=$result;
  }
}else {
  $page = find_page_by_id($id);
}
 ?>

 <?php $page_title="Edit Pages";
 include(SHARED_PATH.'/staff_header.php');
  ?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="page edit">
  <h1>Edit Pages</h1>

  <?php echo display_errors($errors); ?>
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
        <textarea type="textbox" name="content" rows="8" cols="50"/><?php echo h($page['content']);?></textarea>
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Edit Subject">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
