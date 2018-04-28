<?php require_once ('../../private/intialize.php') ?>
<?php require_login(); ?>


<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH.'/staff_header.php') ?>

<div id="content">
  <div id="main-menu">
    <h2> Main Menu</h2>
    <ul>
      <li> <a href= "subjects/index.php">Subjects</a>
        <li> <a href= "pages/index.php">Pages</a>
          <li> <a href="admins/index.php">Admins</a> </li>
    </ul>
  </div>
</div>
<?php include(SHARED_PATH.'/staff_footer.php') ?>
