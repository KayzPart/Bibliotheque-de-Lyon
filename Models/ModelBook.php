<?php 
class ModelBook extends Model {
    public function listAll() {
        $req = $this->getDb()->query('SELECT `id_book`, `title`, `author`, `year_published`, `description`, `category`, `num_isbn`, `photo`, `emplacement`, `lang`, `condition`, `date_limit` FROM `book`');

        $arrayDatas = [];
        while($book = $req->fetch(PDO::FETCH_ASSOC)){
            $arrayDatas[] = new Book($book);
        }
        return $arrayDatas;
    } 
    public function select($id){
        $req = $this->getDb()->prepare("SELECT `id_book`, `title`, `author`, `year_published`, `description`, `category`, `num_isbn`, `photo`, `emplacement`, `lang`, `condition`, `date_limit` FROM `book` WHERE `id_book` = :id");

        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return new Book($req->fetch(PDO::FETCH_ASSOC));
    }
} 