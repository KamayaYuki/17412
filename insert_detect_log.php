<?php
  echo "php_in";
  include 'db_config.php';
  $json = file_get_contents('php://input');
  $data = json_decode($json,true);
  $date = date("Y/m/d H:i:s");
  
  $sql = "INSERT INTO `detect_log`(`rpi_unit_id`,`faceid`, `datetime`) VALUES ('{$data['rpi_unit_id']}', '{$data['face_id']}','{$date}')";
  try{
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec($sql);
    echo "success";
    $db = null;
  }
  catch(PDOException $e){
    echo "failed";
    exit;
  }
?>
