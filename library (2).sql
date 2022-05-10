-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 10 mai 2022 à 06:51
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`) VALUES
(1, '15', 'book');

-- --------------------------------------------------------

--
-- Structure de la table `admin_session`
--

DROP TABLE IF EXISTS `admin_session`;
CREATE TABLE IF NOT EXISTS `admin_session` (
  `id_session_admin` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant_session` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(10000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_session` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_session_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `year_published` varchar(250) NOT NULL,
  `descrip` text NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `emplacement` varchar(4) NOT NULL,
  `lang` varchar(25) NOT NULL,
  `condition` varchar(25) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id_book`, `id_category`, `title`, `author`, `year_published`, `descrip`, `isbn`, `photo`, `emplacement`, `lang`, `condition`) VALUES
(11, 1, 'Mortelle Adèle Hors-Série ; au pays des contes défaits', 'Mr Tan, Diane Le Feyer', '2019', 'Embarquez pour une grande aventure au pays des Contes Défaits avec Mortelle Adèle !\r\n\r\n« Les contes de fées, c\'est vraiment nazebroque ! Le premier lutin qui m\'approche avec ses paillettes magiques, je le catapulte dans l\'espace ! Et ces princes charmants là, avec leurs fées à tout faire, ils croient vraiment que les princesses ont encore besoin qu\'on les sauve ?! Non mais sérieux, il est temps de dépoussiérer un peu tout ça ! » Mortelle Adèle se retrouve propulsée dans le pays des Contes Défaits, un monde merveilleux où tout le monde peut réaliser ses rêves ! Mais celle que tout le monde surnomme Princesse Barbecue traîne une réputation explosive qui détonne avec le calme apparent des habitants du Royaume d\'Enchantement... Un caractère qui pourrait lui être utile pour survivre à la mignonnerie de ce monde étrange, où les princes se la coulent douce tandis que les petites princesses rivalisent de vacheries pour cumuler des points sourire et devenir les héroïnes de leur propre conte ! Pour Adèle, l\'objectif est simple : dégommer la concurrence et écrire un conte d\'un nouveau genre pour les filles ET les garçons !', '9791027607747', 'photo', '3CD4', 'français', 'très bon état'),
(5, 1, 'L\'énigme de la chambre 622', 'Joël Dicker', '2022', 'Un meurtre a été commis au Palace de Verbier dans les Alpes Suisses. Des années plus tard, alors que le coupable n\'a jamais été découvert, un écrivain séjourne dans cet hôtel et se retrouve plongé dans cette affaire, sur fond de triangle amoureux.', '978-2-88973-002-5', 'photo', '1AG2', 'français', 'bon état'),
(6, 1, 'Astérix t.39 ; Astérix et le griffon', 'Jean-Yves Ferri, Didier Conrad', '2021', 'Astérix, Obélix et Idéfix sont de retour pour une 39e  aventure. Accompagnés du plus célèbre des druides, ils s\'apprêtent à partir pour un long voyage en quête d\'une créature étrange et terrifiante.\r\nMi-aigle, mi-lion, énigmatique à souhait, le Griffon sera l\'objet de ce grand voyage !\r\nToujours réalisée par le talentueux duo formé par Jean-Yves Ferri au scénario et Didier Conrad au dessin, nul doute que cette nouvelle aventure proposera une quête épique et semée d\'embûches à nos héros à la recherche de cet animal fantastique !\r\nLe duo, toujours à pied d\'oeuvre pour imaginer de nouvelles aventures, s\'inscrit dans le fabuleux univers créé par René Goscinny et Albert Uderzo.', '9782864973577', 'photo', '1AG3', 'français', 'très bon état'),
(7, 1, 'One Piece - édition originale t.100 ; le fluide royal', 'Eiichiro Oda', '2021', 'Alors que les germes d\'un grand conflit mondial se font de plus en plus prégnants, Luffy et son équipage poursuivent leur folle aventure à la recherche du One Piece. Quels adversaires se dresseront face à eux? Quels alliés parviendront-ils à découvrir? Quels secrets révéleront-ils? Vous le saurez en lisant ce tome 100, proposé à la fois en version normale et en version collector.', '9782344049020', 'photo', '1BG1', 'français', 'bon état'),
(8, 1, '\r\nMy hero Academia t.1 ; Izuku Midoriya, les origines', 'Kohei Horikoshi', '2016', 'Dans un monde où 80 % de la population possède un super-pouvoir appelé alter, les héros font partie de la vie quotidienne. Et les super-vilains aussi ! Face à eux se dresse l\'invincible All Might, le plus puissant des héros ! Le jeune Izuku Midoriya en est un fan absolu. Il n\'a qu\'un rêve : entrer à la Hero Academia pour suivre les traces de son idole.\r\nLe problème, c\'est qu\'il fait partie des 20 % qui n\'ont aucun pouvoir...\r\nSon destin est bouleversé le jour où sa route croise celle d\'All Might en personne ! Ce dernier lui offre une chance inespérée de voir son rêve se réaliser. Pour Izuku, le parcours du combattant ne fait que commencer !', '9782355929489', 'photo', '1AD2', 'français', 'mauvaise état'),
(9, 1, 'Héros d\'un jour', 'Danielle Steel', '2022', 'Un beau matin de mai, deux avions décollent de New York à destination de San Francisco. Quelques heures plus tôt, une agent de sûreté à JFK a trouvé une carte postale portant un message suspect. Inquiète, la jeune femme a alerte la Sécurité intérieure, qui a alors confié le dossier à Ben Waterman.\r\nPersuadé que l\'auteur de l\'étrange missive prévoit de commettre un acte terrible, Ben va tout faire pour découvrir son identité et le vol sur lequel il a embarqué. Dans cette course contre la montre, passagers, équipage et experts vont devoir faire preuve de sang-froid, de solidarité et de courage pour éviter le pire.', '9782266322454', 'photo', '2AG2', 'français', 'très bon état'),
(10, 1, 'Les aventures de Tintin t.16 ; objectif lune', 'Hergé', '1993', 'Tintin et le capitaine Haddock sont invités par le professeur Tournesol à le rejoindre en Syldavie. Sur place, ils apprennent que celui-ci est chargé de construire une fusée à propulsion atomique destinée à être envoyée sur la Lune...', '9782203001152', 'photo', '1AD4', 'français', 'bon état'),
(12, 1, 'Les enfants de la Résistance t.4 ; l\'escalade', 'Vincent Dugomier (Scénario), Benoît Ers (Couleurs)', '2018', 'François, Lisa et Eusèbe ont accompli la plus grande victoire du « LYNX » en détruisant l\'usine de recyclage de cuivre. Mais leur contact avec la résistance est abattu, et l\'heure est plus grave que jamais. Ils doivent maintenir le réseau qu\'il a mis en place, et surtout le développer en assurant le bon acheminement d\'un émetteur-récepteur, lequel leur permettrait de communiquer avec Londres !', '9782803671182', 'photo', '3CD2', 'français', 'bon état'),
(13, 1, 'Les femmes photographes de guerre', 'Collectif', '2022', 'aucun résumé n\'est disponible', '9782759605217', 'photo', '3CG2', 'français', 'mauvais état'),
(14, 1, 'L\'affaire Alaska Sanders', 'Joël Dicker', '2022', 'Avril 1999. Mount Pleasant, une paisible bourgade du New Hampshire, est bouleversée par un meurtre. Le corps d\'une jeune femme, Alaska Sanders, est retrouvé au bord d\'un lac. L\'enquête est rapidement bouclée, la police obtenant les aveux du coupable et de son complice.\r\nOnze ans plus tard, l\'affaire rebondit. Le sergent Perry Gahalowood, de la police d\'État du New Hampshire, persuadé d\'avoir élucidé le crime à l\'époque, reçoit une troublante lettre anonyme. Et s\'il avait suivi une fausse piste ?\r\nL\'aide de son ami l\'écrivain Marcus Goldman, qui vient de remporter un immense succès avec La Vérité sur l\'Affaire Harry Quebert, inspiré de leur expérience commune, ne sera pas de trop pour découvrir la vérité.', '9782889730001', 'photo', '2CG2', 'français', 'bon état'),
(15, 1, 'Trois', 'Valérie Perrin', '2022', '1986. Adrien, Étienne et Nina se rencontrent en CM2. Très vite, ils deviennent fusionnels et une promesse les unit : quitter leur province pour vivre à Paris et ne jamais se séparer.\r\n2017. Une voiture est découverte au fond d\'un lac dans le hameau où ils ont grandi. Virginie, journaliste au passé énigmatique, couvre l\'événement. Peu à peu, elle dévoile les liens extraordinaires qui unissent ces trois amis d\'enfance. Que sont-ils devenus ? Quel rapport entre cette épave et leur histoire d\'amitié ?\r\n\r\nValérie Perrin a ce don de saisir la profondeur insoupçonnée des choses de la vie. Au fil d\'une intrigue poignante et implacable, elle nous plonge au coeur de l\'adolescence, du temps qui passe et nous sépare. Ses précédents romans, Les Oubliés du dimanche et Changer l\'eau des fleurs, ont connu des succès mondiaux.', '9782253936145', 'photo', '4CG2', 'français', 'très bon état'),
(16, 1, 'One Piece - édition originale t.1 ; Romance Dawn, à l\'aube d\'une grande aventure\r\n', 'Eiichiro Oda', '2013', 'Nous sommes à l\'ère des pirates. Luffy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le \"One Piece\", un fabuleux trésor. Par mégarde, Luffy a avalé un jour un fruit démoniaque qui l\'a transformé en homme caoutchouc. Depuis, il est capable de contorsionner son corps élastique dans tous les sens, mais il a perdu la faculté de nager.Avec l\'aide de ses précieux amis, dont le fidèle Shanks, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques. Récemment adapté en dessin animé pour la télévision, One Piece remporte un beau succès au Japon. La sortie de ce manga en France permet à Eiichiro Oda de faire montre de tout son talent de graphiste et de narrateur.', '9782723488525', 'photo', '1AG1', 'français', 'très bon état'),
(17, 1, 'One Piece - édition originale t.2 ; Luffy versus la bande à Baggy !!', 'Eiichiro Oda', '2013', 'Luffy fait la connaissance de Nami, une ravissante jeune fille maîtrisant la navigation. Seulement, Nami déteste les pirates et refuse d\'entrer dans son équipage. Pire, elle fait prisonnier Luffy, pour le livrer au terrible... Baggy le clown !', '9782723489898', 'photo', '1AG1', 'français', 'bon état'),
(18, 1, 'One Piece - édition originale t.3 ; une vérité qui blesse', 'Eiichiro Oda', '2013', 'Tout comme Luffy, Baggy le clown a mangé un fruit du démon. Le pirate peut ainsi séparer son corps en plusieurs morceaux et éviter la plupart des attaques qui le visent. Mais, lorsqu\'il plante ses lames dans le chapeau de Luffy, Baggy ignore la colère dont il va être la source...', '9782723489904', 'photo', '1AG2', 'français', 'bon état'),
(19, 1, 'One Piece - édition originale t.4 ; attaque au clair de lune', 'Eiichiro Oda', '2013', 'Des pirates projettent d\'attaquer le paisible village d\'Usopp ! Ni une, ni deux, Luffy et ses amis décident de piéger la plage et d\'attendre ces derniers de pied ferme. Mais le temps passe et les pirates ne se montrent toujours pas, quand soudain... ils distinguent des cris provenant d\'une direction opposée ?!', '9782723489911', 'photo', '1AG3', 'français', 'bon état');

-- --------------------------------------------------------

--
-- Structure de la table `book_gender`
--

DROP TABLE IF EXISTS `book_gender`;
CREATE TABLE IF NOT EXISTS `book_gender` (
  `id_book_gender` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_gender` int(11) NOT NULL,
  PRIMARY KEY (`id_book_gender`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `book_gender`
--

INSERT INTO `book_gender` (`id_book_gender`, `id_book`, `id_gender`) VALUES
(1, 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Roman'),
(2, 'Manga'),
(3, 'BD'),
(4, 'Magazine'),
(5, 'Journal');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `name_comment` text NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `details_reserv`
--

DROP TABLE IF EXISTS `details_reserv`;
CREATE TABLE IF NOT EXISTS `details_reserv` (
  `id_detail_reserv` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_reserv` int(11) NOT NULL,
  `day_booked` date NOT NULL,
  PRIMARY KEY (`id_detail_reserv`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favorite`
--

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE IF NOT EXISTS `favorite` (
  `id_favorite` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_favorite`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id_gender` int(11) NOT NULL AUTO_INCREMENT,
  `name_gender` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gender`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gender`
--

INSERT INTO `gender` (`id_gender`, `name_gender`) VALUES
(1, 'Fantaisie'),
(2, 'Romance'),
(3, 'Aventure'),
(4, 'Policier'),
(5, 'Science-fiction');

-- --------------------------------------------------------

--
-- Structure de la table `quantity_book`
--

DROP TABLE IF EXISTS `quantity_book`;
CREATE TABLE IF NOT EXISTS `quantity_book` (
  `id_quantity_book` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  PRIMARY KEY (`id_quantity_book`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reserv`
--

DROP TABLE IF EXISTS `reserv`;
CREATE TABLE IF NOT EXISTS `reserv` (
  `id_reserv` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `change_condition` tinyint(1) NOT NULL,
  `date_reserv` date NOT NULL,
  `end_date_reserv` date NOT NULL,
  PRIMARY KEY (`id_reserv`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reserv`
--

INSERT INTO `reserv` (`id_reserv`, `id_book`, `id_user`, `change_condition`, `date_reserv`, `end_date_reserv`) VALUES
(1, 6, 1, 0, '2022-05-04', '2022-05-04');

--
-- Déclencheurs `reserv`
--
DROP TRIGGER IF EXISTS `date_calcul`;
DELIMITER $$
CREATE TRIGGER `date_calcul` AFTER INSERT ON `reserv` FOR EACH ROW update date_limit 
set date_limit = date_reserv + 21
where reserv.date_reserv = new.date_reserv
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `num_member` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `firstname`, `lastname`, `password_user`, `mail`, `num_member`) VALUES
(1, 'gsggggezgz', 'gzegzgezgzegg', 'gzgezgegezgz', 'gzgezgegezgezge', '1515651155');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
