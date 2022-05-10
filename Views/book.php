<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="book">
        
        <p>
            <strong>Auteur :</strong>
            <?= htmlspecialchars($book->getAuthor())?>
        </p>
        <p>
            <strong>ISBN :</strong>
            <?= htmlspecialchars($book->getNum_isbn())?>
        </p>
        <p>
            <strong>Genre :</strong>
            A afficher 
        </p>
        <p>
            <strong>Catégorie :</strong>
            <?= htmlspecialchars($book->getName_category())?>
        </p>
        <p>
            <strong>Date de publication :</strong>
            <?= htmlspecialchars($book->getYear_published())?>
        </p>
    </div>

    <div class="description-book">
        <p>
        <?= htmlspecialchars($book->getDescription())?>
        </p>
    </div>
    <div class="comment">
        <p>Commentaire a afficher</p>
    </div>
    <div class="section">
        <p>
            <strong>
                Emplacement du livre ?
            </strong>
            <?= htmlspecialchars($book->getEmplacement())?>
        </p>
    </div>
    
</body>
</html>