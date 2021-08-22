
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="form.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function success()
        {
            
            
            swal({
                title: "מעולה",
                text: "!המילה עודכנה בהצלחה",
                icon: "success",
                button: "חזרה לרשימה",
            })
            .then((value) => {
                window.location.replace('view.php');
            })
             
        }
        function faild(){
            swal({
                title: "נכשל",
                text: "!עדכון המילה נכשל, נסו שוב",
                icon: "error",
                button: "חזרה לרשימה",
            })
            .then((value) => {
                window.location.replace('view.php');
            })
        }
        
</script>
  </head>
  <body>
  <?php
    include '../WTdb_function.php';
      $mysqli= openDb();
      $id =(isset($_GET['id']))?(int)$_GET['id']:-1;

    if(isset($_POST['update']))
    {
        $update_word = $_POST['word_input'];
        $update_category = $_POST['category'];

        $querya = "UPDATE `words` SET `word`= '$update_word' WHERE `id` = '$id'";
        $result = mysqli_query($mysqli,$querya);

        $queryb = "UPDATE `categories` SET `category`= '$update_category' WHERE `id` = '$id'";
        $result = mysqli_query($mysqli,$queryb);
        
        if($result == TRUE)
        {
           
          echo '<script type="text/javascript">',
          'success();',
          '</script>'
           ;
        }
        else
        {
          echo '<script type="text/javascript">',
                  'faild();',
                  '</script>'
                   ; 
        }
    }

    if(isset($_GET['id']))
    {
      

      $query = "SELECT * FROM `words` WHERE `id` = '$id' ";
      $result = mysqli_query($mysqli,$query);

      $queryc = "SELECT * FROM `categories` WHERE `id` = '$id' ";
      $result = mysqli_query($mysqli,$queryc);
      
      
      if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result))
          {
              $word = $row['word'];
              $category = $row['category'];
          }
      }
      else{
          header('location: view.php');
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
          <input type="text" placeholder="מילה" name="word_input" value="<?php echo $word ?>" />
        </div>
        <div class="input-field">
          <input type="text" placeholder="קטגוריה" name="category" value="<?php echo $category ?>" />
        </div>

        <button type="submit" id="send" class="send" name="update" class="sendInag">
          <img
            class="sent-airplane"
            id="sendBtn"
            src="../Images/send-airplane.png"
            alt=""
          />
        </button>
      </form>
      <div class="play">
          <button class="playBtn"><a href="../game.php">שחק</a></button>
      </div>
    </div>

    
    <script src="form.js"></script>
  </body>
</html>