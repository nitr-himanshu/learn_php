<?php
require_once ('../../private/intialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

  if(isset($_POST['username'])){
    $username = $_POST['username'];
  }else{
    $username = '';
  }

  if(isset($_POST['password'])){
    $password = $_POST['password'];
  }else{
    $password = '';
  }

//validation
if(is_blank($username)){
  $errors[]="Username cannot be blank";
}

if(is_blank($password)){
  $errors[]="Password cannot be blank";
}


if(empty($errors)){
  $admin =find_admin_by_username($username);
  if($admin){
    if(password_verify($password,$admin['hashed_password'])){
      log_in_admin($admin);
      $_SESSION['message']='Login Successful';
      redirect_to(url_for('/staff/index.php'));

    }else{
        $errors[]= 'Login was unsuccessful';
    }
  }else{
    $errors[]= 'Login was unsuccessful';
  }
}

}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
  <h1>Log in</h1>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
