<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>טעינת מילים</title>
  <link rel="shortcut icon" href="../Images/logo.png">
  <link rel="stylesheet" type="text/css" href="./form.css" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    function success() {


      swal({
        title: "מעולה",
        text: "!המילה נוספה בהצלחה",
        icon: "success",
        button: "אישור",
      })


    }

    function faild() {
      swal({
        title: "נכשל",
        text: "!הוספת המילה נכשלה, נסו שוב",
        icon: "error",
        button: "אישור",
      })

    }
  </script>
</head>

<body>
  <?php
  session_start();

  if (!isset($_SESSION['uid'])) {
    header("location: ../login/signIn.php");
  }

  include '../DB/WTdb_function.php';
  $mysqli = openDb();


  if (isset($_POST['send'])) {

    $word = (isset($_POST['word'])) ? (addslashes($_POST['word'])) : -1;
    $category  = (isset($_POST['category'])) ? (addslashes($_POST['category'])) : -1;
    $uid = (isset($_SESSION['uid'])) ? $_SESSION['uid'] : -1;

    $printAlert;

    $exp = "/[^א-תa-zA-Z' '-]/i";

    if (!(preg_match($exp, $word) || $word == '')) {

      $querySelect = "SELECT `id` FROM `categories` WHERE `category` = '$category'";
      $rescategories = mysqli_query($mysqli, $querySelect);
      // $resCat = array($resCategores);
      $categoryTemp;
      $idTemp;

      $row = mysqli_fetch_assoc($rescategories);

      if ($row == null) {
        $queryc = "INSERT INTO `categories` (`category`) VALUES ('$category')";
        $resultc = mysqli_query($mysqli, $queryc);
        $last_id = mysqli_insert_id($mysqli);
        $e = $last_id;

        $queryb = "INSERT INTO `words` (`word`,`category_id`, `user_id`) VALUES ('$word','$e', '$uid')";
        $resultb = mysqli_query($mysqli, $queryb);
        $last_id = mysqli_insert_id($mysqli);

        $printAlert = TRUE;
        

      } else {
        $id = $row['id'];
        $querya = "INSERT INTO `words` (`word`,`category_id`,`user_id`) VALUES ('$word','$id','$uid')";
        $resulta = mysqli_query($mysqli, $querya);
        $last_id = mysqli_insert_id($mysqli);

        $printAlert = TRUE;
      }
    } else {
      $printAlert = FALSE;
      // echo ("יש להקליד ערך תקין");
    }
    if ($printAlert == TRUE) {
      echo '<script type="text/javascript">',
      'success();',
      '</script>';
    } else {
      echo '<script type="text/javascript">',
      'faild();',
      '</script>';
    }
  }
  ?>

  <div class="container">
    <div class="back">
      <a href="../index.php">לעמוד הבית</a>
      <a href="./view.php">לרשימת המילים</a>
    </div>
    <div class="circle"></div>
    <form action="" method="POST" class="sign-up-form" dir="rtl">
      <h2 class="title">הוסף מילים למטוס</h2>
      <div class="input-field">
        <input type="text" placeholder="מילה" name="word" required autofocus />
      </div>
      <div class="input-field">
        <input type="text" placeholder="קטגוריה" name="category" required autofocus />
      </div>

      <button type="submit" id="send" class="send" name="send" class="sendInag">
        <img class="sent-airplane" id="sendBtn" src="../Images/send-airplane.png" alt="" />
      </button>
    </form>
    <div class="play">
      <button class="playBtn"><a href="../game/game.php">שחק</a></button>
    </div>
  </div>
  <script src="form.js"></script>
</body>

</html>