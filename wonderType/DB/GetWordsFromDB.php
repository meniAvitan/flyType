<?php
session_start();
include ('./WTdb_function.php');
      $mysqli = openDb();


      $pid = 3;

      if(isset($_GET['pid'])){
          $pid = $_GET['pid'];
      }else {
    die("Error");
}

  $uid = $_SESSION['uid'];
  // echo $uid;
    
if($pid == 1){
    $query = "SELECT `word` 
    FROM `words` 
    WHERE CHAR_LENGTH(word) <= 3
    AND (user_id = $uid OR user_id IS NULL)";

  }elseif($pid == 2){
     $query = "SELECT `word` 
     FROM `words` 
     WHERE CHAR_LENGTH(word)> 3 
     AND CHAR_LENGTH(word)<= 5
     AND (user_id = $uid OR user_id IS NULL)";

  }elseif($pid == 3){
    $query = "SELECT `word` 
    FROM `words` 
    WHERE CHAR_LENGTH(word) > 5
    AND (user_id = $uid OR user_id IS NULL)";

  }else{
    die('Error');
  }
    $res = mysqli_query($mysqli,$query);

    $ret = array();
    
    while ($row = mysqli_fetch_assoc($res)) {
        $ret[] = $row['word'];
    }
    
    $m = array();
    $m [0] = $ret;

    echo json_encode($m, JSON_UNESCAPED_UNICODE);
    




