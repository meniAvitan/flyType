<?php
session_start();
if (!isset($_SESSION['uid'])) {
  header("location: ../login/signIn.php");
}
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fly-type - משחק</title>
    <link rel="shortcut icon" href="../Images/logo.png">
    <link rel="stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Heebo&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <p id="mainTimer"></p>
    <p id="scoreCount">0</p>
    <div class="sky">
      <img class="cloud" src="../Images/cloud.png" alt="" />
      <img class="cloud" src="../Images/cloud.png" alt="" />
      <img
        id="airplane1"
        src="../Images/airplane.png"
        alt="airplane1"
        style="display: none"
      />
      <img
        id="airplane2"
        src="../Images/airplane2.png"
        alt="airplane2"
        style="display: none"
      />
    </div>
    <div class="grass">
      <img class="tree_1" src="../Images/tree_1.png" alt="" />
      <img class="tree_2" src="../Images/tree_2.png" alt="" />
      <img class="tree_3" src="../Images/tree_2.png" alt="" />
      <img class="tree_4" src="../Images/tree_1.png" alt="" />
      <img class="tree_5" src="../Images/tree_2.png" alt="" />
    </div>
    <div class="road">
      <div class="lines"></div>
    </div>
    <div id="display" dir="rtl" style="display: none;">
      <table id="info">
        <tr>
          <th scope="row">רמת קושי:</th>
          <td><span id="levelCount"></span></td>
        </tr>
        <tr>
          <th scope="row">מילה:</th>
          <td><span id="wordIndex"></span></td>
        </tr>
      </table>
    </div>
    <div class="input" dir="rtl">
      <div id="word"></div>
      <div id="typed"></div>
      <p id="timer">5</p>
      <button id="button">התחל</button>
      <div class="back">
          <a href="../index.php">לעמוד הבית</a>
      </div>
      <div id="menu">  
        <div class="option" dir="ltr">
          <label for="volume">Volume</label>
          <input
            type="range"
            min="0"
            max="1"
            step="0.1"
            name="volume"
            id="volume"
            value="0.5"
          />
        </div>

        <button class="level" id="easyLevel">קל</button>
        <button class="level" id="mediumLevel">בינוני</button>
        <button class="level" id="hardLevel">קשה</button>
        <button class="restart" id="restart">להפעלה מחדש</button>
      </div>
    </div>

   
     <div class="game-score" dir="rtl" style="display: none;">
       <div class="score-content">
        <h1 id="game-score-title">Game over</h1>
        <h2 id="totalWords">סך מילים נכונות - 12</h2>
        <h2 id="highScore"></h2>
        <!-- <table>
         <tr>
           <th>תיאור</th>
           <th>תוצאה</th>
         </tr>
         <tr>
           <td>סך הקשות</td>
           <td id="totalPress">0</td>
         </tr>
         <tr>
           <td>הקשות נכונות</td>
           <td id="successPress">0</td>
         </tr>
         <tr>
           <td>הקשות שגויות</td>
           <td id="worngPress">0</td>
         </tr>
       </table> -->
     
       <button id="score_game">לשמירת התוצאה</button>
       <a href="./game.php">
       <button id="restart_game">להמשיך לשחק</button>
       </a>
       
     
       
       </div>
       
     </div>
     <div class="mobile" dir="rtl">
       <div class="mobile-content">
       <?php  if(isset($_SESSION['uid'])){ ?>
        <h2 id="message"> שלום
          <span>
          <?php
              echo $_SESSION['name']; 
            }?>
            </span> ! המשחק נועד לפיתוח מיומנות ההקלדה 
          ע"י מקלדת בלבד</h2>
          <div class="mobile_back">
          <a href="../index.php">לעמוד הבית</a>
        </div>
 
       </div>
       
     </div>

    <!-- <audio id="scoreAudio">
      <source src="../sounds/score.wav" type="audio/ogg" />
    </audio> -->
    <audio id="winnerAudio">
      <source src="../sounds/winner.wav" type="audio/ogg" />
    </audio>
    <audio id="loserAudio">
      <source src="../sounds/lose.wav" type="audio/ogg" />
    </audio>
    <script src="./script.js" async defer></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  </body>
</html>


