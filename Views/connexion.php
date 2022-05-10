<?php
session_start();

if(isset($_POST['login'])){
    
    $login = $_POST['login']; 
    $password = $_POST['password'];

    $req = $db->prepare('SELECT `id_admin` , `login` , `password` FROM  `admin` WHERE `login` = :loginF');
    $req->bindParam('loginF' , $login , PDO::PARAM_STR);
    $req->execute();
    var_dump($req);
    $log = $req->fetch(PDO::FETCH_ASSOC);
    if($req->rowCount() > 0 && $log['password'] == $password){ 
        $_SESSION['adminId'] = $log['id_admin'];
        header('Location: homepage.php');
    
    }else{ 
        $message = 'Erreur login/password';
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mon compte</title>
</head>

<body>
    <form action="session" method="POST">
        <label for="chooseConnect">Choissisez votre connection : </label>
        <label>
            Administrateur
            <input type="radio" name="chooseConnect" value="admin">
        </label>
        <label>
            Utilisateur
            <input type="radio" name="chooseConnect" value="user">
        </label>
        <br><br>
        <label for="login"> Veuillez rentrer votre login : </label>
        <input type="text" name="login" require>

        <br><br>

        <label for="password">Entrer votre mot de passe</label>
        <input type="password" name="password" require>

        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>

</html>