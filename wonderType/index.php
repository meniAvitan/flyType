<?php
session_start();

// $message_sent = false;
// if(isset($_POST['submit']))
// {
//   // if(filter_var($_POST['name'], FILTER_VALIDATE_EMAIL))
//   // {
//     $userName =    $_POST['name'];
//     $userEmail =   $_POST['email'];
//     $userPhone =   $_POST['phone'];
//     $userMessage = $_POST['message'];
  
//     $to = "m.avitan053@gmail.com";
//     $subject = "message from Fly-type";
//     $body = "";
  
//     $body .= "From: ".$userName. "\r\n";
//     $body .= "Email: ".$userEmail. "\r\n";
//     $body .= "Phone: ".$userPhone. "\r\n";
//     $body .= "Message: ".$userMessage. "\r\n";
  
//     mail($to, $subject, $body);
  
//     $message_sent = true;
  
  
// }







?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Fly-type Home</title>
  <link rel="shortcut icon" href="./Images/logo.png">
  <link rel="stylesheet" href="./home/home.css" />
  <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <?php
      if ($message_sent == TRUE) {
        echo '<script type="text/javascript">',
        'success();',
        '</script>';
      } else {
        echo '<script type="text/javascript">',
        'faild();',
        '</script>';
      }
  
  ?>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-circle-up"></i></button>
  <section id="section-1" dir="rtl">
  
    <div class="circle"></div>
    <header id="navbar">
      <a href="#">
        <img src="./Images/logo.png" class="logo" />
      </a>
      <div class="toggle"></div>
      <ul class="navigation">
        <li><a class="nav" href="#">בית</a></li>
        <li><a class="nav" href="./score/score.php"> תוצאות</a></li>
        <li><a class="nav" href="#qa">טיפים</a></li>
        <li><a class="nav" href="#about">קצת עלינו</a></li>
        <li><a class="nav" href="#contact">צור קשר</a></li>
        </ul>
        <div class="sign-in_section">
        <a class="logout-login" href="">
            <?php
              if(isset($_SESSION['uid'])){
                ?>
                <div class = 'user_name'><?php echo $_SESSION['name'];?></div>
                <?php
                echo "<form method=POST class = 'logout_btn'>
                 <button name = 'logout'><i  class='fas fa-sign-out-alt'>
                 <span class='tooltiptext'>התנתקות</span>
                 </i></button>
                
                </form>";
                if(isset($_POST['logout'])){
                  session_destroy();
                  header('location: ./login/signIn.php');
                  exit();
                }
              }
              else{
                echo "<a class='logout-login' href='./login/signIn.php'>התחברות</a>";
              }
              
            ?> 
        </a>
     
        </div>
        
    </header>
    <div class="content">
      <div class="textBox">
        <h2>
          זה לא סתם משחק <br />
          זה <span>לעוף על המקלדת</span>
        </h2>
        <p>
          המשחק נוצר מתוך צורך לפלטפורמה לפיתוח מיומנות ההקלדה בשילוב של חוויה
          עם שליטה על רמת הביצועים ומאגרי מילים אישיים
          בפלטפורמה הזו תהנו מיכולת לפתח את יכולת ההלדה שלכם בשילוב עם משחק מהנה , פשוט משחקים - ויכולת ההקלדה משתפרת בקצב מהיר.

        </p>
        <a href="./form/form.php">רוצה לנסות?</a>
      </div>
      <div class="imgBox">
        <img src="./Images/typing.png" alt="" class="typeSvg" />
      </div>
    </div>
  </section>
  <section id="section-2" dir="rtl">
    <div class="content" id="about">
      <div class="textBox">
        <h2>בסיס לשיטת ההקלדה</h2>
        <p>
          צפו בסרטון כדי ללמוד על שיטת הבסיס להקלדה נכונה על ידי
          מיקומים מדוייקים של האצבעות על המקלדת כך שלכל אצבע יש מספר מקשים
          שהיא אחראית עליהם.
          תרגלו את האצבוע מהבסיס בשילוב עם המשחק תוכלו להזין את האותיות / מילים
          שתרצו לתרגל.
        </p>
      </div>
    </div>
    <div class="video-Box">
      <iframe src="https://www.youtube.com/embed/n5ZpQpJhz5A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  </section>
  <section id="section-3" dir="rtl">
    <div class="accordion" id="qa">
      <div class="accordion-item">
        <div class="accordion-item-header">
          מה צריך לעשות?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
          מאוד מומלץ לצפות בסרטון הדרכה,
           ללחוץ על התחברות להרשם למערכת ולהתחיל לשחק ולהינות !
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          כמה זה עולה?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
           בשלב זה המערכת כולה חינמית לחלוטין
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          רשימת טיפים להקלדה נכונה
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            <ul style="padding-left: 1rem;">
              <li>צפו בסרטון הדרכה</li>
              <li>תרגלו את האותיות / מילים שהכי קל לכם לבצע</li>
              <li>לא למהר לשלבים הקשים - הביצוע הוא העיקר</li>
              <li>להקפיד על איצבוע נכון</li>
              <li>להינות מהמשחק!</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          איך זה עובד?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            יש 3 רמות קושי במשחק,
            <ul style="padding-left: 1rem;">
              <li> קל - עד 3 אותיות - 50 שניות למשחק</li>
              <li>בינוני - עד 5 אותיות - 20 שניות למשחק</li>
              <li>קשה - 6 אותיות ומעלה (כולל חיבור של מילים) - 15 שניות למשחק</li>
            </ul>
           
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <div class="accordion-item-header">
          למה כדאי לדעת להקליד מהר?
        </div>
        <div class="accordion-item-body">
          <div class="accordion-item-body-content">
            כיום כתיבה על נייר פחות שימושית מהקלדת על המקלדת,
            פיתוח מיומנות ההקלדה מביאה לחיסכון משמעותי
             בזמן שאלו שמסביבך מחפשים את האות הבאה במקלדת
             אתה כבר בסוף השורה : )
          </div>
        </div>
      </div>
  </section>
  <section id="section-4" dir="rtl">
    <div class="content-4">
      <h2 class="title-4">אז קדימה חבל על הזמן...</h2>
      <a href="./game/game.php">רוצה לשחק</a>
      <img class="img-4" src="./Images/type.svg" alt="">
    </div>
  </section>
  <section id="section-contact" dir="rtl">
    <div class="contact-main" id="contact">
      <form action="index.php" method="POST" class="sign-up-form" dir="rtl">
        <h2 class="contact-title">צור קשר</h2>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input name="name" type="text" placeholder="שם" required>
        </div>
        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <input name="email" type="text" placeholder="אימייל" required>
        </div>
        <div class="input-field">
          <i class="fas fa-phone"></i>
          <input name="phone" type="number" placeholder="פלאפון" required>
        </div>

        <textarea name="message" id="" cols="30" rows="10"></textarea>

        <input name="submit" type="submit" value="שלח" class="btn solid">
      </form>
    </div>

    <img class="contact-img" src="./Images/contact.jpg" alt="">

  </section>
  <footer class="footer">
    <div class="container">
      <div class="row">


        <h4>follow us</h4>
        <div class="social-links">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="https://www.linkedin.com/in/menachem-avitan-563a0a203/"><i class="fab fa-linkedin-in"></i></a>
        </div>

      </div>
      <div class="credit">
        <h4>created by <span> <a href="http:www.meni-web.com">M</a></span>enachem Avitan & <span> <a href=" https://wa.me/972506680517">E</a></span>lad Amos</h4>
      </div>

    </div>
  </footer>



  <script src="./home/home.js"></script>
</body>

</html>