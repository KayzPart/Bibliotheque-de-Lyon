<?php
    class ControllerBook {
        public static function listAllBook(){
            $loader = new Twig\Loader\FilesystemLoader('./Views');
            $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
            $twig->addExtension(new \Twig\Extension\DebugExtension());

            $datas = new ModelBook();
            $allBooks = $datas->listAll();
            $allListNews = $datas->listNewsBook();
            echo $twig->render('homepage.twig', ['books' => $allBooks]);

        }

        public static function listAllNewsBook(){
            $datas = new ModelBook();
            $allListNews = $datas->listNewsBook();
        }
        public static function readBook(int $id){
            $datas = new ModelBook ();
            $book = $datas->select($id);
            require_once './Views/book.php';
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
        public static function ShowGender(){
            $manager = new ModelBook();
            $gBook = $manager->ViewGender();
            require_once './Views/admin_book_ajout.php';
        }
        public static function newBook($datas){
            $datas = $_POST;
            $manager = new ModelBook();
            $newBook = $manager->insertBook($datas);
            $editBook = $manager->editBook($datas);
            require_once './Views/admin_book_ajout.php';
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

        