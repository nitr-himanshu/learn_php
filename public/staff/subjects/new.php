<?php require_once('../../../private/intialize.php');
require_login();
if(is_post_request()){
  extract($_POST);
  $subject=[];
  $subject['menu_name']=$menu_name;
  $subject['position']=$position;
  $subject['visible']=$visible;
  $result=insert_subject($subject);
  if($result === true){
    $new_id=mysqli_insert_id($db);
    $_SESSION['message']='The subject was created successfully.';
    redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));
  }
  else{
    $errors=$result;
  }

}


$subject_count=find_no_of_subject()+1;
$subject=[];
$subject['position']=$subject_count;
?>

<?php $page_title="Create Subjects";
include(SHARED_PATH.'/staff_header.php');
 ?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php');?>">&laquo;Back to list</a>
  <div class="subject new">
  <h1>Create Subjects</h1>
  <?php echo display_errors($errors); ?>

  <form class="" action="" method="post">
    <dl>
      <dt>Menu Name</dt>'
      <dd> <input type="text" name="menu_name" value="" autofocus> </dd>
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
        <input type="checkbox" name="visible" value="1">
      </dd>
    </dl>
    <div class="" id="operations">
      <input type="submit" name="" value="Create Subject">
    </div>
  </form>
</div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php'); ?>
