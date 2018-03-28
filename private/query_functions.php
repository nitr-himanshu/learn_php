<?php
function find_all_subjects(){
  global $db;

  $sql = "SELECT * FROM subjects ";
  $sql.="ORDER BY position ASC";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}

function find_subject_by_id($id){
  global $db;
  $sql ="SELECT * FROM subjects ";
  $sql.= "WHERE id='".db_escape($db, $id)."'";
  $result=mysqli_query($db,$sql);
  confirm_result_set($result);
  $subject = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $subject;
}

function insert_subject($subject){
  global $db;

  $errors=validate_subject($subject);
  if(!empty($errors)){
    return $errors;
  }
  $sql="INSERT INTO subjects ";
  $sql.= "(menu_name, position, visible) ";
  $sql.="VALUES(";
  $sql.= "'".db_escape($db,$subject['menu_name'])."', ";
  $sql.= "'".db_escape($db,$subject['position'])."', ";
  $sql.= "'".db_escape($db,$subject['visible'])."'";
  $sql.=")";

  $result=mysqli_query($db,$sql);
  if($result){
    //Insert success
    return true;
  }
  else{
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_no_of_subject(){
  $subject_set=find_all_subjects();
  $subject_count=mysqli_num_rows($subject_set);
  mysqli_free_result($subject_set);
  return $subject_count;
}

function update_subject($subject){
  global $db;

  $errors=validate_subject($subject);
  if(!empty($errors)){
    return $errors;
  }

  $sql = "UPDATE subjects SET ";
  $sql.= "menu_name= '".db_escape($db,$subject['menu_name'])."', ";
  $sql.= "position= '".db_escape($db,$subject['position'])."', ";
  $sql.= "visible= '".db_escape($db,$subject['visible'])."' ";
  $sql.= "WHERE id='".db_escape($db,$subject['id'])."' ";
  $sql.= "LIMIT 1;";

  $result = mysqli_query($db,$sql);

  if($result){
    return true;
  }
  else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_subject($id){
  global $db;
  $sql = "DELETE FROM subjects ";
  $sql.= "WHERE id='".db_escape($db,$id)."' ";
  $sql.="LIMIT 1";
  echo $sql;
  $result=mysqli_query($db,$sql);
  if($result){
    return true;
  }
  else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function validate_subject($subject){
  $errors=[];

  //menu name
  if(is_blank($subject['menu_name'])){
    $errors[]="Name cannot be blank.";
  }
  elseif(!has_length($subject['menu_name'],['min'=>2, 'max'=>255])){
    $errors[]="Name must be between 2 and 255 characters";
  }

  //position
  //make sure we are working with integer
  $position_int=(int)$subject['position'];
  if($position_int<=0){
    $errors[]="Position must be greater than zero";
  }
  if($position_int>999){
    $errors[]="Position must be less than 999.";
  }

  //visible
  //make sure we are working with string
  $visible_str=(string)$subject['visible'];
  if(!has_inclusion_of($visible_str,["0","1"])){
    $errors[]="Visible must be true or false";
  }

  return $errors;

}

function find_all_pages(){
  global $db;

  $sql = "SELECT * FROM pages ";
  $sql.="ORDER BY position ASC";
  $result = mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}

function find_page_by_id($id){
  global $db;
  $sql ="SELECT * FROM pages ";
  $sql.= "WHERE id='".db_escape($db,$id)."'";
  $result=mysqli_query($db,$sql);
  confirm_result_set($result);
  $page = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $page;
}

function find_pages_by_subject_id($subject_id){
  global $db;
  $sql ="SELECT * FROM pages ";
  $sql.= "WHERE subject_id='".db_escape($db,$subject_id)."' ";
  $sql.="ORDER BY position ASC";
  $result=mysqli_query($db,$sql);
  confirm_result_set($result);
  return $result;
}

function insert_page($page){
  global $db;
  $errors=validate_page($page);
  if(!empty($errors)){
    return $errors;
  }

  $sql="INSERT INTO pages ";
  $sql.= "(menu_name, position, visible,content,subject_id) ";
  $sql.="VALUES(";
  $sql.= "'".db_escape($db,$page['menu_name'])."', ";
  $sql.= "'".db_escape($db,$page['position'])."', ";
  $sql.= "'".db_escape($db,$page['visible'])."',";
  $sql.= "'".db_escape($db,$page['content'])."', ";
  $sql.= "'".db_escape($db,$page['subject_id'])."'";
  $sql.=")";

  $result=mysqli_query($db,$sql);
  if($result){
    //Insert success
    return true;
  }
  else{
    //insert failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_no_of_pages(){
  $page_set=find_all_pages();
  $page_count=mysqli_num_rows($page_set);
  mysqli_free_result($page_set);
  return $page_count;
}

function update_page($page){
  global $db;

  $errors=validate_page($page);
  if(!empty($errors)){
    return $errors;
  }

  $sql = "UPDATE pages SET ";
  $sql.= "subject_id= '".db_escape($db,$page['subject_id'])."', ";
  $sql.= "menu_name= '".db_escape($db,$page['menu_name'])."', ";
  $sql.= "position= '".db_escape($db,$page['position'])."', ";
  $sql.= "visible= '".db_escape($db,$page['visible'])."', ";
  $sql.= "content= '".db_escape($db,$page['content'])."' ";
  $sql.= "WHERE id='".db_escape($db,$page['id'])."' ";
  $sql.= "LIMIT 1;";

  $result = mysqli_query($db,$sql);

  if($result){
    return true;
  }
  else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_page($id){
  global $db;
  $sql="DELETE FROM pages ";
  $sql.="WHERE id='".db_escape($db,$id)."' ";
  $sql.="LIMIT 1";
  $result = mysqli_query($db,$sql);
  if($result){
    return true;
  }
  else{
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function validate_page($page){
  $errors=[];

  //subject_id
  if(is_blank($page['subject_id'])){
    $errors="Please select Subject id";
  }

  //menu name
  if(is_blank($page['menu_name'])){
    $errors[]="Name cannot be blank.";
  }
  elseif(!has_length($page['menu_name'],['min'=>2, 'max'=>255])){
    $errors[]="Name must be between 2 and 255 characters";
  }

  //position
  //make sure we are working with integer
  $position_int=(int)$page['position'];
  if($position_int<=0){
    $errors[]="Position must be greater than zero";
  }
  if($position_int>999){
    $errors[]="Position must be less than 999.";
  }

  if(isset($page['id'])){
    $current_id=$page['id'];
  }else{
    $current_id=0;
  }
  if(!has_unique_page_menu_name($page['menu_name'],$current_id)){
    $errors[]="Menu name must be unique";
  }


  //visible
  //make sure we are working with string
  $visible_str=(string)$page['visible'];
  if(!has_inclusion_of($visible_str,["0","1"])){
    $errors[]="Visible must be true or false";
  }


  if(is_blank($page['content'])){
    $errors[]="Please fill content.";
  }


  return $errors;

}

 ?>
