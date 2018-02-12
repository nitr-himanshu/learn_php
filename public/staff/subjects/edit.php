<?php require_once('../../../private/intialize.php');
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
      <dd> <input type="text" name="menu_name" value=""> </dd>
    </dl>
    <dl>
      <dt>Position</dt>
      <dd> <select class="" name="position">
        <option value="1">1</option>
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
