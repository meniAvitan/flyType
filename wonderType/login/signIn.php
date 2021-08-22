<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>התחברות</title>
    <link rel="shortcut icon" href="../Images/logo.png">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sign.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function success()
        {
            
            
            swal({
                title: "מעולה",
                text: "!המילה נוספה בהצלחה",
                icon: "success",
                button: "חזרה לטופס",
            })
            
            
        }
        function faild(){
            swal({
                title: "נכשל",
                text: "!שם משתמש או הסיסמא שגויים",
                icon: "error",
                button: "חזרה ",
            })
        
        }

</script>
</head>
<body>
<?php
session_start();
include '../DB/WTdb_function.php';
      $mysqli= openDb();
      
      
    if(isset($_GET['login'])){
    $password =(isset($_GET['password']))? (addslashes($_GET['password'])):-1;
    $encpass = md5('a'.$password);
    $mail=(isset($_GET['mail']))? (addslashes($_GET['mail'])):-1;

    $querya = "SELECT `id`, `full_name`
    FROM `users` 
    WHERE `password` = '$encpass' 
    AND  `mail`='$mail'";
    
   
    $result = mysqli_query($mysqli,$querya);
    // echo "$querya";

    $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1><center>Login successful</center></h1>";
            $row = mysqli_fetch_assoc($result);
              $_SESSION['uid'] = $row ['id']; 
              $_SESSION['name'] = $row ['full_name'];
               header('location: welcome.php');
        }  
        else{  
            echo '<script type="text/javascript">',
                    'faild();',
                    '</script>'
                     ;  
        } 
}
?>
    <div class="container" dir="">
        <div class="back">
            <a href="../index.php">לעמוד הבית</a>
          </div>
         
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" dir="rtl">
                    <h2 class="title">כניסה למערכת</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" id="mail" name="mail" placeholder="דואר אלקטרוני" value="" required>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="בחר סיסמה" value="" required> 
                    </div>
                    <input type="submit" name="login" value="כניסה" class="btn solid">
                    <!-- <a href="../form/form.php">הכנס כאורח</a> -->

                 
                </form>

                <!-- SIGN-UP -->

                <form action="./register.php" class="sign-up-form" dir="rtl">
                    <h2 class="title">הרשמה למערכת</h2>
                  
                        <button type="submit" class="btn solid">הרשמה</button>
                    
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content"  dir="rtl">
                    <h3>חדש כאן?</h3>
                    <p>הרשם למערכת והתחל לעוף...</p>
                    <button class="btn transparent" id="sign-up-btn">הרשמה</button>
                </div>
                <img src="../Images/register.svg" alt="" class="image">
            </div>

            <div class="panel right-panel">
                <div class="content" dir="rtl">
                    <h3 >כבר איתנו?</h3>
                    <p> הכנס למערכת והתחל לעוף...</p>
                    <button class="btn transparent" id="sign-in-btn">כניסה</button>
                </div>
                <img src="../Images/login.svg" alt="" class="image">
            </div>
        </div>
    </div>

    <script src="sign.js"></script>
</body>
</html>