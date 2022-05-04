<?php 
    // On prolonge la session
    session_start();
    $id_session = session_id();
        // if(!isset($_SESSION['adminId'])){
        //     header('Location: ./connexion.php');
        // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h1>Espace admin</h1>
        <?php 
            if($id_session){
                echo '\'id de session récupérer via session_id() => <br>' .$id_session. '<br>';
            }
            echo '<br><br>';
            if(isset($_COOKIE['PHPSESSID'])){
                echo 'ID de session (récupéré via $_COOKIE) : <br>'
                .$_COOKIE['PHPSESSID'];
            }
            
        ?>
</body>
</html>

