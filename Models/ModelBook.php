<?php
class ModelBook extends Model
{
    // Affichage de tous les livres
    public function listAll()
    {
        $db = $this->getDb();
        $req = $db->query('SELECT `book`.`id_book`, category.`name_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang` FROM `book` INNER JOIN category ON book.id_category = category.id_category');


        $books = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($book);
        }
        return $books;
    }

    // Affichage des dix derniers livres
    public function listNewsBook()
    {
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_book`,`photo` FROM `book` ORDER BY `id_book` DESC LIMIT 10');

        $arrayDatas = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $arrayDatas[] = new Book($book);
        }
        return $arrayDatas;
    }

    // Affichage des sugestions de livres (3) 
    public function suggestBook() {
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
        $req = $db->prepare("SELECT `id_category`, `id_condition_book`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang` FROM `book` WHERE `id_book` = :id");

        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Book($req->fetch(PDO::FETCH_ASSOC));
    }
    public function insertBook($datas){
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
            var_dump($_FILES);
            
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

            $db = $this->getDb();
            $req = $db->prepare("INSERT INTO `book`(`id_category`, `id_condition_book`,`title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`) VALUES (:id_category, :id_condition_book, :title, :author, :year_published, :descrip, :isbn, :photo, :emplacement, :lang)");

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


            $req->execute();

            $idBook = $db->lastInsertId();

            $newBook = [];

            while ($b = $req->fetch(PDO::FETCH_ASSOC)) {
                $newBook[] = new Book($b);
            }
            return $newBook;

            if (!empty($_POST['gender'])) {
                foreach ($_POST['gender'] as $value) {
                    $reqGenderBook = $db->prepare('INSERT INTO book_gender (`id_book`, `id_gender`) VALUES (:id_book, id_gender)');
                    $reqGenderBook->bindParam('id_book', $idBook, PDO::PARAM_INT);
                    $reqGenderBook->bindParam('id_gender', $value, PDO::PARAM_INT);
                    $reqGenderBook->execute();
                }
            }
        var_dump($_POST);
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

    public function ViewGender(){
        $db = $this->getDb();

        $req = $db->query("SELECT `id_gender`, `name_gender` FROM `gender`");
        $arrayGender = [];
        while ($row = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayGender[] = new Book($row);
        }
        return $arrayGender;
    }
    public function editBook(){
        $db = $this->getDb();
        $req = $db->prepare('UPDATE `book` SET id_condition_book = :id_condition_book, emplacement = :emplacement WHERE id_book = :id_book');
        $req->bindParam(':id_condition_book', ':emplacement'); 
        $req->execute();
    }
    public function listAllDesc() {
        $db = $this->getDb();
        $req = $db->query('SELECT `id_book`,`name_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang` FROM `book` ORDER BY id_book DESC');

        $books = [];
        while ($book = $req->fetch(PDO::FETCH_ASSOC)) {
            $books[] = new Book($book);
        }
        return $books;
    }
    public function searchBook() {

        if(isset($_GET['p'] )){
            $recherche = $_GET['p'];
            
        } 
        $db = $this->getDb();
        $req = $db->query("SELECT `id_book`,`title`,`photo` FROM `book`  WHERE `title` LIKE '$recherche%'  ");
        
        
        $datas = [];
        while($data =  $req->fetch(PDO::FETCH_ASSOC)){
            $datas[] = new Book($data);
    
        }
    }
    
}
