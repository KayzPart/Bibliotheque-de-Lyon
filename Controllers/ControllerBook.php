<?php
    class ControllerBook {
        // Affichage des nouveautés et des suggestion (homepage)
        public static function listAllBook(){
            $loader = new Twig\Loader\FilesystemLoader('./Views');
            $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
            
            $twig->addExtension(new \Twig\Extension\DebugExtension());

            $datas = new ModelBook();
            $allBooks = $datas->suggestBook();
            $allListNews = $datas->listNewsBook();
            echo $twig->render('homepage.twig', ['books' => $allListNews, 'sBook' => $allBooks]);
        }
        // public static function listBookAfterInsert(){
        //     $datas = new ModelBook();
        //     $afterInsert = $datas->listAll();
        //     require_once './Views/book.php';
        // }
        public static function readBook($id){
            $loader = new Twig\Loader\FilesystemLoader('./Views');
            $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
            $twig->addExtension(new \Twig\Extension\DebugExtension());
            $datas = new ModelBook ();
            $book = $datas->select($id);
            echo $twig->render('book.twig', ['book' => $book]);
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
        public static function newBook($datas,$id_condition_book, $emplacement, $quantity ){
            $datas = $_POST;
            $manager = new ModelBook();
            $newBook = $manager->insertBook($datas);

            // $editBook = $manager->editBook($id_condition_book, $emplacement, $quantity);

            require_once './Views/admin_book_ajout.php';
        }
        public static function searchBook() {
            $manager = new ModelBook();
            $sBT= $manager->searchBookTitle();
            $sBT= $manager->searchBookAuthor();
            $sBT= $manager->searchBookDate();
            $sBT= $manager->searchBookLang();
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

        