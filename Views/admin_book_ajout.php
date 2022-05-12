<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
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

        <label for="category-type" >
            Catégorie :
        </label>
        <br>
        <div class="category-ajout">
            <select name="category-type">
                <option name="category-type" value="1">Roman</option>
                <option name="category-type" value="2">Manga</option>
                <option name="category-type" value="3">BD</option>
                <option name="category-type" value="4">Magazine</option>
                <option name="category-type" value="5">Journal</option>
            </select>
        </div>

        <br><br>

        <label for="gender">Genre : </label>
        <div class="genre-ajout">
            <input type="checkbox" name="gender[]" value="1">
            <label>Fantaisie</label>
            <br>
            <input type="checkbox" name="gender[]" value="2">
            <label>Action</label>
            <br>
            <input type="checkbox" name="gender[]" value="3">
            <label>Aventure</label>
            <br>
            <input type="checkbox" name="gender[]" value="4">
            <label>Comédie</label>
            <br>
            <input type="checkbox" name="gender[]" value="5">
            <label>Romance</label>
            <br>
            <input type="checkbox" name="gender[]" value="6">
            <label>Histoire</label>
            <br>
            <input type="checkbox" name="gender[]" value="7">
            <label>Policier</label>
            <br>
            <input type="checkbox" name="gender[]" value="8">
            <label>Guerre</label>
            <br>
            <input type="checkbox" name="gender[]" value="9">
            <label>Drame</label>
            <br>
            <input type="checkbox" name="gender[]" value="10">
            <label>Horreur</label>
            <br>
            <input type="checkbox" name="gender[]" value="11">
            <label>Science-Fiction</label>
            <br>
            <input type="checkbox" name="gender[]" value="12">
            <label>Biographie</label>
        </div>

      
       

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

        <input type="radio" name="condition" value="1">
        <label for="condition">Très bon</label>

        <input type="radio" name="condition" value="2">
        <label for="condition">Bon</label>

        <input type="radio" name="condition" value="3">
        <label for="condition">Mauvais</label>

        <button type="submit" name="submit">Envoyer</button>
    </form>
</body>

</html>
