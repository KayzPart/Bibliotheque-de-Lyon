<?php 
    class ModelCategory extends Model{
        // Select Catégorie
        public function readCategory($id){
            $db = $this->getDb();

            $req = $db->prepare('SELECT `id_category`, `name_category` FROM `category` WHERE `id_category` = :id');
            $req->bindParam(':id', $id['id_category'], PDO::PARAM_INT);
            $req->execute();

            $category = [];
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $category[] = new Category($data);
            }
            return $category;
        }
    }