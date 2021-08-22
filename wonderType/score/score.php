<?php
session_start();
include '../DB/WTdb_function.php';

if (!isset($_SESSION['uid'])) {
  header("location: ../login/signIn.php");
}

$mysqli = openDb();

// $current_score = null;
// $current_level = null;

  //$current_score  = (isset($_GET['score'])) ?  $_GET['score'] : -1;
  //$current_level = (isset($_GET['level'])) ? $_GET['level'] : -1;
$uid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : -1;

$querya = "SELECT * FROM grades
WHERE user_id = $uid
ORDER BY current_score DESC";
$resulth = mysqli_query($mysqli, $querya);

if(isset($_POST['submit']))
{
  $level = $_POST['levels'];
  $queryb = "SELECT * FROM grades
  WHERE `level` = '$level'
  AND user_id = $uid 
  ORDER BY current_score DESC";
  $resulth = mysqli_query($mysqli, $queryb);
}
if(isset($_POST['allScore']))
{
  $queryc = "SELECT * FROM grades
  WHERE user_id = $uid
  ORDER BY current_score DESC";
  $resulth = mysqli_query($mysqli, $queryc);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>תוצאות</title>
  <link rel="shortcut icon" href="../Images/logo.png">
  <link rel="stylesheet" href="score.css" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


</head>

<body dir="rtl">
<div class="back">
      <a href="../index.php">לעמוד הבית</a>
  </div>
  <div class="res_img">
    <img src="../Images/result.svg" alt="">
  </div>
  <h1 class="name"> היסטורית תוצאות של <?php echo  $_SESSION['name']; ?></h1>
  <form class="levels" action="" method="POST">
    <select name="levels" class="level_options">
      <option  value="קל" >קל</option>
      <option  value="בינוני">בינוני</option>
      <option  value="קשה">קשה</option>
    </select>
    <button name="submit"><i class="fas fa-search"></i></button>
    <button class="allScore" name="allScore">לכל התוצאות</button>
  </form>
  <div class="container" dir="rtl">
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>תאריך</th>
          <th>רמת קושי</th>
          <th>סטטוס</th>
          <th>תוצאה</th>
          <th>שיא</th>
        </tr>
      </thead>
      <?php
      $i = 1;
      while ($row = mysqli_fetch_assoc($resulth)) : ?>
        <tr>
          <td>
            <?php
            echo $i;
            $i++;
            ?>

          </td>
          <td class="words"><?php echo $row['date'] ?></td>
          <td class="category"><?php echo $row['level']; ?></td>
          <td class="category" id="status"><?php echo $row['status']; ?></td>
          <td class="category"><?php echo $row['current_score']; ?></td>
          <td class="category"><?php echo $row['high_score']; ?></td>


        </tr>
      <?php endwhile ?>
      <?php echo '' ?>

    </table>
  </div>
  <!-- <script src="./score.js"></script> -->
</body>

</html>