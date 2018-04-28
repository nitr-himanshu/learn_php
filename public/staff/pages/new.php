<?php require_once('../../../private/intialize.php');
require_login();

$page_count=find_no_of_pages();
$subject_count=find_no_of_subject();
$subject_set=find_all_subjects();
$page=[];
$page['menu_name']='';
$page['visible']='';
$page['position']=$page_count+1;

if(is_post_request()){
  extract($_POST);
  $page=[];
  $page['menu_name']=$menu_name;
  $page['subject_id']=$subject_id;
  $page['position']=$position;
  $page['visible']=$visible;
  $page['content']=$content;
  $result=insert_page($page);
  if($result === true){
    $new_id=mysqli_insert_id($db);
    $_SESSION['message']='The page was created successfully';
    redirect_to(url_for('/staff/pages/show.php?id='.$new_id));
  }
  else{
    $errors=$result;
  }
}

$page_title="Create Pages";
include(SHARED_PATH.'/staff_header.php');
?>
<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php');?>">&laquo;Back to list</a>
  <div class="page new">
  <h1>Create Pages</h1>
  <?php echo display_errors($errors); ?>
  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>
      <dd> <input type="text" name="menu_name" value="<?php echo h($page['menu_name']);?>" autofocus> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd>
        <select class="" name="position">
          <?php
          for ($i=1;$i<=$page_count+1;$i++){
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
        <select class="" name="subject_id">
          <?php while($subject=mysqli_fetch_assoc($subject_set)){ ?>
              <option value="<?php echo h($subject['id']); ?>">
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
        <input type="checkbox" name="visible" value="1" <?php if($page['visible']=="1"){ echo "Checked";} ?> >
      </dd>
    </dl>
    <dl>
      <dt>Content</dt>
      <dd>
        <textarea type="textbox" name="content" rows="5" style="width:250px"/></textarea>
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Create Pages">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
