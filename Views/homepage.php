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
        <a href="./connexion">Connexion</a>
    </button>
    <?php
        foreach($allBooks as $books){
    ?>
    <div class="books">
        <h2><?= htmlspecialchars($books->getTitle())?></h2>
        <p>date de parution:<?= htmlspecialchars($books->getYear_published())?></p>
        <p>Emplacement :<?= htmlspecialchars($books->getEmplacement())?></p>
        <p>Langue : <?= htmlspecialchars($books->getLang())?></p>
        <a href="./book/<?= htmlspecialchars($books->getId_book())?>">Reserver</a>
    </div>
    <?php } ?>


    <?php
        foreach($bookSugg as $books){
    ?>
    <div class="suggestion">
        <h3><?= htmlspecialchars($books->getTitle()) ?></h3>
    </div>
    <?php } ?>
</body>
</html>