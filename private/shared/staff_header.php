<?php
if (!isset($page_title)) { $page_title= 'Staff Area';}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>"/>
    <title>GMHS-<?php echo h($page_title);?> </title>

  </head>
  <body>
    <header>
      <h1> GMHS- STAFF AREA</h1>
    </header>

    <navigation>
      <ul>
        <li> User :
          <?php if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
          }
          ?>
        </li>
          <li><a href="<?php echo url_for("/staff/index.php"); ?>">Menu </a></li>
          <li><a href="<?php echo url_for("/staff/logout.php"); ?>">Logout </a></li>
      </ul>
    </navigation>

    <?php echo display_session_message(); ?>
