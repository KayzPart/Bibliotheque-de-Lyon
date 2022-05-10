<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./book/create" method="POST" enctype="multipart/form-data">
        <label for="title">Titre :</label>
        <input type="text" name="title">

        <br><br>

        <label for="author">Auteur :</label>
        <input type="text" name="author">

        <br><br>

        <label for="year_published">Année de publication :</label>
        <input type="text" name="year_published">
        <br><br>

        <label>Description :</label>
        <textarea name="descrip" placeholder="Veuillez entrer une description du livre"></textarea>

        <br><br>

        <label>Catégorie :</label>
        <select name="id_category">
            <?php foreach($sBook as $book){ ?>
                <option value="<?= $book->getId_category()?>"> <?=$book->getName_category()?></option>
            <?php } ?>
        </select>

        <br><br>

      
       

        <br><br>

        <label for="isbn">ISBN :</label>
        <input type="text" name="isbn">

        <br><br>

        <label for="photo">Ajoutez une image de couverture :</label>
        <input type="file" name="photo" accept="image/png, image/jpeg, image/jpg">

        <br><br>

        <label for="lang">Langue :</label>
        <input type="text" name="lang">

        <br><br>

        <label for="emplacement">Emplacement :</label>
        <input type="text" name="emplacement">

        <br><br>

        <label for="condition">État</label>

        <input type="radio" name="condition" value="très bon">
        <label for="condition">Très bon</label>

        <input type="radio" name="condition" value="bon">
        <label for="condition">Bon</label>

        <input type="radio" name="condition" value="mauvais">
        <label for="condition">Mauvais</label>

        <input type="submit" name="submit"> envoyer

    </form>
</body>

</html>
