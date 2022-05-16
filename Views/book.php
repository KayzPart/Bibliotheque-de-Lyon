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
    
        <p><strong>Date de sortie:</strong>  <?= date('d M Y', strtotime($book->getYear_published()))?></p>
    </div>
    
</body>
</html>