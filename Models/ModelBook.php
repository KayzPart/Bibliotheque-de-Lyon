<?php 
class ModelBook extends Model {
    public function listAll() {
        $db = $this->getDb();

        $req = $db->query('SELECT `id_book`, `id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` ORDER BY `id_book` DESC');

        $arrayDatas = [];
        while($books = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayDatas[] = new Book($books);
        }
        return $arrayDatas;
    } 
    public function select($id){
        $db = $this->getDb();
        $req = $db->prepare("SELECT `id_book`, `id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` WHERE `id_book` = :id");

        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Book($req->fetch(PDO::FETCH_ASSOC));
    }
    public function suggestBook(){
        $db = $this->getDb();
        $req = $db->query('SELECT `id_book`, `id_category`,`title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition` FROM `book` WHERE `id_book` = 5 OR `id_book` = 6 OR `id_book` = 7');

        $arrayDatas = [];
        while($books = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayDatas[] = new Book($books);
        }
        return $arrayDatas;
    }
} 