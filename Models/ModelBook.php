<?php 
class ModelBook extends Model {
    public function listAll() {
        $db = $this->getDb();
        $req = $db->query('SELECT `book`.`id_book`, category.`name_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` INNER JOIN category ON book.id_category = category.id_category');

        $books = [];
        while($book = $req->fetch(PDO::FETCH_ASSOC)){
            $books[] = new Book($book);
        }
        return $books;
    } 

    public function listNewsBook(){
        $db = $this->getDb();
        $req = $db->prepare('SELECT `id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` ORDER BY `id_book` ASC LIMIT 2');

        $arrayDatas = [];
        while($book = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayDatas[] = new Book($book);
        }
        return $arrayDatas;
    }
    
    public function select($id){
        $req = $this->getDb()->prepare("SELECT `id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` WHERE `id_book` = :id");

        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Book($req->fetch(PDO::FETCH_ASSOC));
    }


    public function insertBook($datas){
     $db = $this->getDb();
     if(!empty($_FILES)){
        $fichier = './public/couverture/';
        $img_cover = $_FILES['photo']['name'];
            if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0){
                if ($_FILES['photo']['size'] <= 100000){
                    $infosfichier = pathinfo($_FILES['photo']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'GIF', 'JPEG');
                    if (in_array($extension_upload,$extensions_autorisees)){
                    move_uploaded_file($_FILES['photo']['tmp_name'], $fichier.basename($_FILES['photo']['name']));
                    }else {
                        echo 'Image trop grand';
                    }
                }else{
                    echo 'Erreur du téléchargement !';
                }
            }else{ 
                echo 'Erreur, vous navez pas accès !';
            }

    }
            $datas['photo'] = $_FILES['photo']['name'];
          
            
            if(isset($_POST['submit'])){
            
                
                $datas['title'] = $_POST['title'];
                $datas['author'] = $_POST['author'];
                $datas['year_published'] = $_POST['year_published'];
                $datas['descrip'] = $_POST['descrip'];
                $datas['id_category'] = (int)$_POST['id_category'];
                $datas['isbn'] = $_POST['isbn'];
                $datas['emplacement'] = $_POST['emplacement'];
                $datas['lang'] = $_POST['lang'];
                $datas['condition'] = $_POST['condition'];

                $req = $db->prepare("INSERT INTO`book`(`id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition`) VALUES (:id_category, :title, :author, :year_publish, :descrip,:isbn, :photo, :emplacement, :lang, :condition)");

                $req->bindParam('id_category', $datas['id_category'], PDO::PARAM_INT);
                $req->bindParam('title', $datas['title'], PDO::PARAM_STR);
                $req->bindParam('author', $datas['author'], PDO::PARAM_STR);
                $req->bindParam('year_published', $datas['year_published'], PDO::PARAM_STR);
                $req->bindParam('descrip', $datas['descrip'], PDO::PARAM_STR);
                $req->bindParam('isbn', $datas['isbn'], PDO::PARAM_STR);
                $req->bindParam('photo', $datas['photo'], PDO::PARAM_STR);
                $req->bindParam('emplacement', $datas['emplacement'], PDO::PARAM_STR);
                $req->bindParam('lang', $datas['lang'], PDO::PARAM_STR);
                $req->bindParam('condition', $datas['condition'], PDO::PARAM_STR);
                $req->execute();
                
            }
        var_dump($datas,$_POST);
        
    }
    public function ViewCate(){
        $db = self::getDb();

        $req = $db->query("SELECT `id_category`,`name_category` FROM `category`");
        $arrayCate = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayCate[] = new Book($row);
        }
        return $arrayCate;
        
    }
        

}
//$reqGender = $db->prepare('INSERT INTO book_gender(`id_book`, `id_gender`) VALUES (:id_book, :id_gender)');     
// $reqGender->bindParam('id_book', $idBook, PDO::PARAM_STR);
// $reqGender->bindParam('id_gender', $value, PDO::PARAM_STR);