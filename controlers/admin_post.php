<?php
//session_start();

/**
 * Gestion du formulaire de la page admin2.php pour la création d'un nouveau billet
 * 
 */
// Chargement autoloading Composer
require '../vendor/autoload.php';

// Appel ici de BookManager.php le manager d'entité Book
require_once '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Appel ici de l'entité Book
require_once '../models/classe/App/Entity/Book.php';
use classe\App\Entity\Book;
$book = new Book();


// Traitement du formulaire pour créer un nouveau billet avec suppressions des balises html de l'éditeur TinyMce
if (isset($_POST['title']) AND !empty($_POST['title']) AND isset($_POST['billet']) AND !empty($_POST['billet'])) {
	
	$title = $book->setTitle(htmlspecialchars($_POST['title']));
	$billet = $book->setBillet(strip_tags($_POST['billet']));
	
	$bookManager->create($book);


} 

include '../views/admin2.php';