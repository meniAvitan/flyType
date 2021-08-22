<?php
session_start();
include '../DB/WTdb_function.php';
$mysqli = openDb();

if (!isset($_SESSION['uid'])) {
    header("location: ../login/signIn.php");
  }

  $id = $_SESSION['uid'];
        $querya_select = "SELECT w.id, `word`, `category_id`, `category`, `user_id`
        FROM words AS w
        JOIN categories AS c ON c.id = w.category_id
        JOIN users AS u ON u.id = w.user_id
        WHERE user_id = '$id'";
        $result = mysqli_query($mysqli, $querya_select);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>מילים</title>
    <link rel="shortcut icon" href="../Images/logo.png">
    <link rel="stylesheet" type="text/css" href="./view.css">

    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-a11y="true"></script>
</head>

<body>
    
    
        

    
    <div class="circle"></div>
    <div class="back">
      <a href="../index.php">לעמוד הבית</a>
    </div>
    <div class="btns">
        <a href="../game/game.php">שחק</a>
        <a href="./form.php"> <i class="fas fa-plus"></i> הוסף מילה</a>
    </div>
    <!-- <div class="add_words">
        
    </div>
    <div class="play">
     
    </div> -->
    <div class="container" dir="rtl">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>מילה</th>
                    <th>קטגוריה</th>
                    <th class="actions" colspan="2">פעולות</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td>
                        <?php
                        echo $i;
                        $i++;
                        ?>

                    </td>

                    <td class="words"><?php echo $row['word'];?></td>
                    <td class="category"><?php echo $row['category'];?></td>
                    <!-- <td class="update">
                        <a href="update.php?id=<?php echo $row['id']; ?>">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td> -->
                    <td class="delete">
                        <a href="delete.php?id=<?php echo $row['id']; ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endwhile ?>

        </table>
    </div>
   
</body>

</html>