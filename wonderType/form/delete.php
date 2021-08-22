
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function success()
        {
            
            
            swal({
                title: "מעולה",
                text: "!המילה נמחקה בהצלחה",
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
                text: "!מחיקת המילה נכשלה, נסו שוב",
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
include '../DB/WTdb_function.php';
$mysqli= openDb();

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $querya = "DELETE FROM `words` WHERE `id` = '$id' ";
    $result = mysqli_query($mysqli,$querya);
    
    
    // $queryb = "DELETE FROM `categories` WHERE `id` = '$id' ";
    // $result = mysqli_query($mysqli,$queryb);
    
   
        
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

?>

</body>
</html>
