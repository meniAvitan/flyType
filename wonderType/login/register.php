<?php
session_start();
include '../DB/WTdb_function.php';
      $mysqli= openDb();
      
    if(isset($_POST['send'])){
    
    $fname=(isset($_POST['fname']))? (addslashes($_POST['fname'])):-1;
    $lname=(isset($_POST['lname']))? (addslashes($_POST['lname'])):-1;
    $fullname = "$fname $lname";
    $password =(isset($_POST['password']))? (addslashes($_POST['password'])):-1;
    $encpass = md5('a'.$password);
    $mail=(isset($_POST['mail']))? (addslashes($_POST['mail'])):-1;
    $userlogon = $mail;
    $phonenumber=(isset($_POST['phonenumber']))? (addslashes($_POST['phonenumber'])):-1;
    $birthdate=(isset($_POST['birthdate']))? (addslashes($_POST['birthdate'])):-1;
    
    $querya = "INSERT INTO `users` (`fname`,`lname`,`full_name`,`userlogin`,`password`,`mail`,`phone_number`,`birthdate`) "
            . "VALUES ('$fname','$lname','$fullname','$userlogon','$encpass','$mail','$phonenumber','$birthdate')";
    $result = mysqli_query($mysqli,$querya);
    $last_id = mysqli_insert_id($mysqli);
    echo "$querya";

     header('location: signIn.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>הרשמה</title>
    <link rel="shortcut icon" href="../Images/logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sign.css">
</head>
<body>
    <div class="container" dir="">
        
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-in-form" dir="rtl">
                <div class="back">
                    <a href="../index.php">לעמוד הבית</a>
                </div>
                    <h2 class="title">הרשמה למערכת</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fname" id="fname" placeholder="שם פרטי" value="" required>   
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="lname" id="lname" placeholder="שם משפחה" value="" required>   
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="mail" name="mail" placeholder="דואר אלקטרוני" value="" required>  
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="בחר סיסמה" value="" required>    
                    </div>
                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="number" id="phonenumber" name="phonenumber" placeholder="ספר טלפון" value="" required>
                    </div>
                    <div class="input-field">
                        <i class="far fa-calendar-alt"></i>
                        <input type="date" id="birthdate" name="birthdate" placeholder="תאירך לידה" value="" required>
                    </div>
                    <button name="send" class="btn solid">הרשמה</button>
                    <!-- <a href="../form/form.php">הכנס כאורח</a> -->
                    
                </form>
                <!-- SIGN-IN -->
                <form action="./signIn.php" class="sign-up-form" dir="rtl">
                    <h2 class="title">כניסה למערכת</h2>
                  
                        <button type="submit" class="btn solid">כניסה</button>
                        
                    
                </form>
               
            </div>
            
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content"  dir="rtl">
                    <h3 >כבר איתנו?</h3>
                    <p> הכנס למערכת והתחל לעוף...</p>
                    
                    <button class="btn transparent" id="sign-up-btn">כניסה</button>
                </div>
                <img src="../Images/register.svg" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content" dir="rtl">
                    <h3 >חדש כאן?</h3>
                    <p>הרשם למערכת והתחל לעוף...</p>
                    <button class="btn transparent" id="sign-in-btn">הרשמה</button>
                </div>
                <img src="../Images/login.svg" alt="" class="image">
            </div>
        </div>
    </div>

    <script src="sign.js"></script>
</body>
</html>