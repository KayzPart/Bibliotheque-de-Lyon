<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<button>
        <a href="./connectAdmin">Administrateur</a>
    </button>
    <button>
        <a href="./connectUser">Utilisateur</a>
    </button>
    <form action="session" method="POST">
        <h1>Utilisateur</h1>
        <label for="mail">Veuillez rentrer votre mail :</label>
        <input type="text" name="mail">

        <br><br>

        <label for="password">Entrer votre mot de passe</label>
        <input type="password" name="password">

        <input type="submit" name="submit" value="Se connecter">
    </form>
</body>

</html>