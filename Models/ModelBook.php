<?php

use Symfony\Component\VarDumper\VarDumper;

class ModelBook extends Model
{
    // Affichage de tous les livres
    public function listAll($p)
    {
        $db = $this->getDb();

        $reqCount = $db->query('SELECT COUNT(`id_book`) FROM `book`');
        $count = $reqCount->fetchColumn();
        $nbPages =  ceil($count / 10);
        $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $limit = $p * 10;

        $req = $db->prepare('SELECT `id_book`, `id_category`, `id_condition_book`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `quantity` FROM `book` WHERE `id_book` ORDER BY `id_book` DESC LIMIT :p, 10');
        $req->bindParam('p', $limit, PDO::PARAM_INT);
        $req->execute();

        $books = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($book);
        }
        return [$books, $nbPages];
    }

    // Affichage des dix derniers livres
    public function listNewsBook()
    {
        $db = $this->getDb();
        $news = $db->query('SELECT `id_book`, `photo`, `title` FROM `book` ORDER BY `id_book` DESC LIMIT 10');

        $newsBooks = [];
        while ($book = $news->fetch(PDO::FETCH_ASSOC)) {
            $newsBooks[] = new Book($book);
        }
        return $newsBooks;
    }

    // Affichage des sugestions de livres (3) 
    public function suggestBook()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT `id_book`,`photo` FROM `book` WHERE `id_book` = 5 OR `id_book` = 6 OR `id_book` = 7');

        $books = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($book);
        }
        return $books;
    }

    public function select($id)
    {
        $db  = $this->getdb();
        $req = $db->prepare("SELECT `id_book`,`category`.`name_category`, `book`.`id_condition_book`, `condition_book`.`status_condition`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `quantity` FROM `book` INNER JOIN `category` ON `category`.`id_category` = `book`.`id_category` INNER JOIN  `condition_book` ON `condition_book`.`id_condition_book` = `book`.`id_condition_book` WHERE `id_book` = :id");

        $req->bindParam(':id', $id['id_book'], PDO::PARAM_INT);
        $req->execute();


        $data = $req->fetch(PDO::FETCH_ASSOC);
        $book = new Book($data);
        $category = new Category($data);
        $condition = new ConditionBook($data);


        return [$book, $category, $condition];
    }
    public function insertBook($datas)
    {
    
        if (isset($_POST['submit'])) {

            if (isset($_FILES['photo']) and $_FILES['photo']['error'] == 0) {

                if (isset($_FILES['photo']['size']) <= 10000000) {

                    $infosfichier = pathinfo($_FILES['photo']['name']);

                    $extension_upload = $infosfichier['extension'];

                    $extensions_autorisees = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];

                    if (in_array($extension_upload, $extensions_autorisees)) {

                        $minuscule = strtolower($_POST['title']);

                        $searchString = " ";

                        $replaceString = "";

                        $finalString = str_replace($searchString, $replaceString, $minuscule);

                        $date = date('dmyhis');

                        $ref = $finalString . '_' . $date . '_couverture';


                        move_uploaded_file($_FILES['photo']['tmp_name'], './public/couverture/' . $ref . '.' . $extension_upload);
                    } else {
                        echo 'Extensions incorrect';
                    }
                } else {
                    echo 'Image trop grande !';
                }
            } else {
                echo 'Erreur, de téléchargement !';
            }
            $id_category = $_POST['category-type'];
            $id_condition_book = $_POST['condition'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year_published = $_POST['year_published'];
            $descrip = $_POST['descrip'];
            $isbn = $_POST['isbn'];
            $photo = $ref . '.' . $extension_upload;
            $emplacement = $_POST['emplacement'];
            $lang = $_POST['lang'];
            $quantity = $_POST['quantity'];


            $db = $this->getDb();
            $req = $db->prepare('INSERT INTO `book`(`id_category`, `id_condition_book`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `quantity`) VALUES (:id_category, :id_condition_book, :title, :author, :year_published, :descrip, :isbn, :photo, :emplacement, :lang, :quantity)');

            $req->bindParam('id_category', $id_category, PDO::PARAM_INT);
            $req->bindParam('id_condition_book', $id_condition_book, PDO::PARAM_INT);
            $req->bindParam('title', $title, PDO::PARAM_STR);
            $req->bindParam('author', $author, PDO::PARAM_STR);
            $req->bindParam('year_published', $year_published, PDO::PARAM_STR);
            $req->bindParam('descrip', $descrip, PDO::PARAM_STR);
            $req->bindParam('isbn', $isbn, PDO::PARAM_STR);
            $req->bindParam('photo', $photo, PDO::PARAM_STR);
            $req->bindParam('emplacement', $emplacement, PDO::PARAM_STR);
            $req->bindParam('lang', $lang, PDO::PARAM_STR);
            $req->bindParam('quantity', $quantity, PDO::PARAM_INT);

            $req->execute();

            $idBook = $db->lastInsertId();

            if (!empty($_POST['gender'])) {

                foreach ($_POST['gender'] as $value) {
                    $db = $this->getDb();
                    $reqGenderBook = $db->prepare('INSERT INTO `book_gender` (`id_book`, `id_gender`) VALUES (:id_book, :id_gender)');

                    $reqGenderBook->bindParam('id_book', $idBook, PDO::PARAM_STR);
                    $reqGenderBook->bindParam('id_gender', $value, PDO::PARAM_STR);
                    $reqGenderBook->execute();
                }
            }

            $newBook = [];

            while ($b = $req->fetch(PDO::FETCH_ASSOC)) {
                $newBook[] = new Book($b);
            }
            return $newBook;
        }
    }
    public function ViewCondi()
    {
        $db = $this->getDb();
        $reqCondi = $db->query('SELECT `id_condition_book `, `status_condition` FROM `condition_book`');
        $arrayCondi = [];
        while ($row = $reqCondi->fetch(PDO::FETCH_ASSOC)) {
            $arrayCondi[] = new Book($row);
        }
        return $arrayCondi;
    }
    public function ViewCate()
    {
        $db = self::getDb();

        $req = $db->query("SELECT `id_category`,`name_category` FROM `category`");
        $arrayCate = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayCate[] = new Book($row);
        }
        return $arrayCate;
    }

    // Affichage par liste descendante 
    public function listAllDesc()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT `id_book`,`title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang` FROM `book` ORDER BY id_book DESC');

        $books = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($book);
        }
        return $books;
    }

    // Recherche (searchBar)
    public function spaceSearch($searchcat, $search, $p)
    {
        if ($searchcat == 'id_category') {
            $searchimp = $searchcat . ' = ' . $search;
        } else {
            if (!empty(trim($search))) {
                $words = explode(" ", trim($search));
            } else {
                $words = explode(" ", $search);
            }

            for ($i = 0; $i < count($words); $i++) {
                $sh[$i] = $searchcat . " LIKE '%" . $words[$i] . "%'";
            }

            $searchimp = implode(' OR ', $sh);
        }

        $db = $this->getdb();

        $reqPages = $db->prepare("SELECT COUNT(`id_book`) FROM `book` WHERE $searchimp");
        $reqPages->execute();

        $count = $reqPages->fetchColumn();
        $nbPages =  ceil($count / 10);

        $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        $limit = $p * 10;

        $datas = $db->prepare("SELECT `id_book`, `id_category`, `id_condition_book`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `quantity` FROM `book` WHERE $searchimp ORDER BY `id_book` ASC LIMIT :p, 10");
        $datas->bindParam('p', $limit, PDO::PARAM_INT);
        $datas->execute();

        $searchResult = [];
        while ($resultS = $datas->fetch(PDO::FETCH_ASSOC)) {
            $searchResult[] = new Book($resultS);
        }
        return [$searchResult, $nbPages];
    }

    public function updateBook($id, $id_category, $id_condition_book, $title, $author, $year_published, $descrip, $isbn, $photo, $emplacement, $lang, $quantity)
    {
        if (isset($_POST['submit'])) {

            if (isset($_FILES['photo']) and $_FILES['photo']['error'] == 0) {

                if (isset($_FILES['photo']['size']) <= 10000000) {

                    $infosfichier = pathinfo($_FILES['photo']['name']);

                    $extension_upload = $infosfichier['extension'];

                    $extensions_autorisees = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];

                    if (in_array($extension_upload, $extensions_autorisees)) {

                        $minuscule = strtolower($_POST['title']);

                        $searchString = " ";

                        $replaceString = "";

                        $finalString = str_replace($searchString, $replaceString, $minuscule);

                        $date = date('dmyhis');

                        $ref = $finalString . '_' . $date . '_couverture';


                        move_uploaded_file($_FILES['photo']['tmp_name'], './public/couverture/' . $ref . '.' . $extension_upload);
                    } else {
                        echo 'Extensions incorrect';
                    }
                } else {
                    echo 'Image trop grande !';
                }
            } else {
                echo 'Erreur, de téléchargement !';
            }
            $id_category = $_POST['category-type'];
            $id_condition_book = $_POST['condition'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $year_published = $_POST['year_published'];
            $descrip = $_POST['descrip'];
            $isbn = $_POST['isbn'];
            $photo = $ref . '.' . $extension_upload;
            $emplacement = $_POST['emplacement'];
            $lang = $_POST['lang'];
            $quantity = $_POST['quantity'];

            $db = $this->getdb();
            $update = $db->prepare('UPDATE `id_category`= :id_category,`id_condition_book`= :id_condition_book,`title`= :title,`author`= :author,`year_published`= :year_published,`descrip`= :descrip,`isbn`= :isbn,`photo`= :photo,`emplacement`= :emplacement,`lang`= :lang,`quantity`= :quantity WHERE `id_book` = :id');
            $update->bindParam('id', $id, PDO::PARAM_INT);
            $update->bindParam('id_category', $id_category, PDO::PARAM_INT);
            $update->bindParam('id_condition_book', $id_condition_book, PDO::PARAM_INT);
            $update->bindParam('title', $title, PDO::PARAM_STR);
            $update->bindParam('author', $author, PDO::PARAM_STR);
            $update->bindParam('year_published', $year_published, PDO::PARAM_STR);
            $update->bindParam('descrip', $descrip, PDO::PARAM_STR);
            $update->bindParam('isbn', $isbn, PDO::PARAM_STR);
            $update->bindParam('photo', $photo, PDO::PARAM_STR);
            $update->bindParam('emplacement', $emplacement, PDO::PARAM_STR);
            $update->bindParam('lang', $lang, PDO::PARAM_STR);
            $update->bindParam('quantity', $quantity, PDO::PARAM_INT);

            $update->execute();

            $idBook = $db->lastInsertId();

            if (!empty($_POST['gender'])) {

                foreach ($_POST['gender'] as $value) {
                    $db = $this->getDb();
                    $reqGenderBook = $db->prepare('INSERT INTO `book_gender` (`id_book`, `id_gender`) VALUES (:id_book, :id_gender)');

                    $reqGenderBook->bindParam('id_book', $idBook, PDO::PARAM_STR);
                    $reqGenderBook->bindParam('id_gender', $value, PDO::PARAM_STR);
                    $reqGenderBook->execute();
                }
            }

            $newBook = [];

            while ($b = $update->fetch(PDO::FETCH_ASSOC)) {
                $newBook[] = new Book($b);
            }
            return $newBook;
        }
    }
}
