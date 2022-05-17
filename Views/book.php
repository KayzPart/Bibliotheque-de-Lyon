<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livre sélectionner</title>
</head>
<body>
    <div class="book-select">
        <figure>
            <img src="../public/couverture/<?= $book->getPhoto() ?>" alt="" style="width: 250px">
        </figure>
        <h1><?= $book->getTitle() ?></h1>
        <section>
            <p>
                <strong>Auteur :</strong> 
                <?= $book->getAuthor() ?>
            </p>
            <p>
                <strong>ISBN :</strong>
                <?= $book->getIsbn() ?>
            </p>
            <p>
                <strong>Genre :</strong>
               <!--  //$book->getName_gender() -->
            </p>
            <p>
                <strong>Catégorie :</strong>
                <?= $book->getId_category() ?>
            </p>
            <p>
                <strong>Date de sortie :</strong>
                <?= date('d M Y', strtotime($book->getYear_published()))?>
            </p>
        </section>
    </div>
    
</body>
</html>