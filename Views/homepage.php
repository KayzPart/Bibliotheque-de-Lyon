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
    <?php foreach($allBooks as $book){ ?>
        <div class="slide-nouveautees">
            <a href="./book/<?= htmlspecialchars($book->getId_book())?>" style="text-decoration: none; color:black; display: block; width: fit-content">
                
            </a>
        </div>

        <div class="books">
            <a href="./book/<?= htmlspecialchars($book->getId_book())?>" style="text-decoration: none; color:black; display: block; width: fit-content">
                
                <h2><?= htmlspecialchars($book->getTitle())?></h2>
                <img src="" alt="couverture">
                <p>date de parution:<?= htmlspecialchars($book->getYear_published())?></p>
                <p>Emplacement :<?= htmlspecialchars($book->getEmplacement())?></p>
                <p>Langue : <?= htmlspecialchars($book->getLang())?></p>
                <a href="./userReserv/<?= htmlspecialchars($book->getId_book())?>">Reserver</a>
            </a>
        </div>
    <?php } ?>
</body>
</html>