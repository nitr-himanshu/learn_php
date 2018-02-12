<?php
require_once('../../../private/intialize.php');
//Handle form value sent by new.php

if(is_post_request()){
extract($_POST);
echo "Form parameter<br />";
echo "Menu Name ".$menu_name."<br/>";
echo "Position ".$position."<br/>";
echo "Visible ".$visible."<br/>";
}
else{
  redirect_to(url_for('/staff/subjects/new.php'));
}
 ?>
