
<?php
session_start();
include '../DB/WTdb_function.php';
      $mysqli= openDb();

      if (!isset($_SESSION['uid'])) {
        header("location: ../login/signIn.php");
      }
   
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>ברוך הבא</title>
            <link rel="shortcut icon" href="../Images/logo.png">
            <link rel="stylesheet" href="./welcome.css">
       <style>
         body{text-align: center;}
         /* p{padding-bottom: 0; margin-bottom:0;}
         select {width: 300px;}
         input {width: 300px;} */
         /*input {width: 300px;}*/
         a{display: inline-block;}
       
        </style>
    </head>
    <body dir="rtl">
      <div class="back">
      <a href="../index.php">לעמוד הבית</a>
      </div>
    
    <div class="circle"></div>
    <img class="welcome_img" src="../Images/welcome.svg">
        <h1 class="title">שלום <?php
        if($_SESSION['name'] == false)
        {
          echo "שחקן";
        } else{
          echo $_SESSION['name'];
        }  ?></h1>
        <div class="option_btn">
          <a class="to_form" href="../form/form.php">לטעינת מילים</a>
          <a class="to_game" href="../game/game.php">התחל לשחק</a>
        </div>
             
            
       
</html>