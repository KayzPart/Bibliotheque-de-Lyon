<?php
class ModelGender extends Model
{
    // Afficher gender
    public function readGender($id)
    {
        $db = $this->getDb();

        $req = $db->prepare("SELECT `id_book_gender`, `book`.`id_book`, `gender`.`name_gender`, `gender`.`id_gender` FROM `book`  INNER JOIN `book_gender` ON `book`.`id_book` = `book_gender`.`id_book` INNER JOIN `gender` ON `gender`.`id_gender` = `book_gender`.`id_gender` WHERE `book`.`id_book` = :id_book");
        $req->bindParam('id_book', $id['id_book'], PDO::PARAM_INT);
        $req->execute();

        $gender = [];
        while($g = $req->fetch(PDO::FETCH_ASSOC)){
            $gender[] = new Gender($g);
        }

        return $gender;
    }
    // Affiche tous les genres
    public function allGender(){
        $db = $this->getDb();

        $req = $db->query("SELECT `id_gender`, `name_gender` FROM `gender`");

        $genderAll = [];
        while($g = $req->fetch(PDO::FETCH_ASSOC)){
            $genderAll[] = new Gender($g);
        }

        return $genderAll;
    }
}
