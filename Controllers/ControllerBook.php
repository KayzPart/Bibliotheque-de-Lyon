<?php
    class ControllerBook extends ControllerTwig{
        // Affichage des nouveautés et des suggestion (homepage)
        public static function listAllBook(){
            $twig = ControllerTwig::twigControl();
            
            $datas = new ModelBook();
            $allBooks = $datas->suggestBook();
            $allListNews = $datas->listNewsBook();
            echo $twig->render('homepage.twig', ['books' => $allListNews, 'sBook' => $allBooks, 'root' => ROOT]);
        }

        // public static function listBookAfterInsert(){
        //     $datas = new ModelBook();
        //     $afterInsert = $datas->listAll();
        //     require_once './Views/book.php';
        // }
        public static function readBook($id){
            $twig = ControllerTwig::twigControl();

            $datas = new ModelBook ();
            $book = $datas->select($id);

            echo $twig->render('book.twig', ['book' => $book[0], 'category' => $book[1], 'root' => ROOT]);
        }

        public static function newBook($datas){
            $datas = $_POST;
            $manager = new ModelBook();
            $newBook = $manager->insertBook($datas);
            require_once './Views/admin_book_ajout.php';
        }
        public static function Show(){
            $manager = new ModelBook();
            $sBook = $manager->ViewCate();
            require_once './Views/admin_book_ajout.php';
        }
        public static function ShowCondi(){
            $manager = new ModelBook();
            $cBook = $manager->ViewCondi();
            require_once './Views/admin_book_ajout.php';
        }
        // public static function ShowGender(){
        //     $manager = new ModelBook();
        //     $gBook = $manager->ViewGender();
        //     require_once './Views/admin_book_ajout.php';
        // }
        
        public static function spaceSearch(){
            $searchcat = $_GET['searchcat'];
            $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
            if($searchcat == 'id_category'){
                $search = $_GET['categories'];
            }else{
                $search = $_GET['s'];
            }
            var_dump($searchcat);
            $twig = Controllertwig::twigcontrol();
            $manager = new ModelBook();
            $result = $manager->spaceSearch($searchcat, $search, $p);
            echo $twig->render('search.twig', ['root' => ROOT, 'books' => $result[0], 'nbrpages' => $result[1]]);
        }

        public static function editBookForm($id, $id_condition_book, $emplacement, $quantity){
            $id = $_GET['id_book'];
            $manager = new ModelBook(); 
            $update = $manager->editBook($id, $id_condition_book, $emplacement, $quantity);
            require_once './Views/admin_book_ajout.php';
        }
        public static function redirectionUpdate(){
            require_once 'book.twig';
        }
    }

    // function lister_image($repertoire){
    //     // var_dump($repertoire);
    //     // Vérifier que le dossier est bien un répertoire
    //     if(is_dir($repertoire)){
    //         // Verifier que le dossier est accessible et l'ouvrir
    //         if($iteration = opendir($repertoire)){
    //             // Parcourir le contenu du dossier
    //             while(($fichier = readdir($iteration)) !== false){
    //                 // Exclure les arguments . et ... pour eviter que le script ne change de dossier
    //                 if($fichier != "." && $fichier != ".."){
    //                     // Verifier que les fichiers osnt des images
    //                     $fichier_info = finfo_open(FILEINFO_MIME);
    //                     $mime_type = finfo_file($fichier_info, $repertoire.$fichier);
    //                     if(strpos($mime_type, 'image/') === 0){
    //                         echo '<img src="'.$repertoire.$fichier.'" alt="">';
    //                     }
    //                 }
    //                 var_dump($fichier);
    //             }
    //             closedir($iteration);
    //         }
    //     }
    // }
    // lister_image('./public/ressources/');

        