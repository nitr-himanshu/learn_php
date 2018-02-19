<?php
require_once('../../../private/intialize.php');
//Handle form value sent by new.php

if(is_post_request()){
extract($_POST);
$subject=[];
$subject['menu_name']=$menu_name;
$subject['position']=$position;
$subject['visible']=$visible;
$result=insert_subject($subject);
$new_id=mysqli_insert_id($db);
redirect_to(url_for('/staff/subjects/show.php?id='.$new_id));

}
else{
  redirect_to(url_for('/staff/subjects/new.php'));
}
 ?>
