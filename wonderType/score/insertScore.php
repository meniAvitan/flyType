<?php
session_start();
include '../DB/WTdb_function.php';
$uid = $_SESSION['uid'];


$mysqli = openDb();


if (isset($_POST['score'])) 
{
  $current_score  = (isset($_POST['score'])) ?  $_POST['score'] : -1;
  $current_level = (isset($_POST['level'])) ? $_POST['level'] : -1;
  $status = (isset($_POST['status'])) ? $_POST['status'] : -1;
  $uid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : -1;


  $querySelect = "SELECT `high_score` 
                  FROM `grades` 
                  WHERE `user_id` = $uid";

  $rescategories = mysqli_query($mysqli, $querySelect);
  $row = mysqli_fetch_assoc($rescategories);

  $h = $row['high_score'];
  echo $h;


  if ($h == NULL || $current_score >= $h) 
  {
    $h = $current_score;
    $querya = "INSERT INTO `grades` (`user_id`, `date`, `level`, `status`, `current_score`, `high_score`) 
               VALUES ('$uid', TIMESTAMP(NOW()), '$current_level', '$status', '$current_score', '$current_score')";
    $result = mysqli_query($mysqli, $querya);
    
      $queryaup = "UPDATE `grades` 
                   SET `high_score`= $current_score
                   WHERE `user_id` = $uid";
      $result = mysqli_query($mysqli, $queryaup);
    echo $querya;
  }
  else //$h > $current_score
  {
    $queryc = "INSERT INTO `grades` (`user_id`, `date`, `level`, `status`, `current_score`) 
                 VALUES ('$uid', TIMESTAMP(NOW()), '$current_level', '$status', '$current_score')";
    $result = mysqli_query($mysqli, $queryc);

    $querycup = "UPDATE `grades` 
                 SET `high_score`= $h
                 WHERE `user_id` = $uid";
    $result = mysqli_query($mysqli, $querycup);
    echo $queryc . $querycup;
  }
}
echo $uid;

?>
