<?php
/**
 * 
 * Gestion du formulaire de la page user_comments.php pour le formulaire de création des commentaires et des boutons de signalements des commentaires
 * 
 */
// Chargement autoloading Composer
require '../vendor/autoload.php';

// Chargement de la Classe BookManager, gestionnaire d'entité pour les billets
require '../models/classe/App/Manager/BookManager.php';
use classe\App\Manager\BookManager;
$bookManager = new BookManager();

// Chargement de la Classe Book, entité pour les billets
require '../models/classe/App/Entity/Book.php';
use classe\App\Entity\Book;
$book = new Book();

// Chargement de la Classe CommentarysManager, gestionnaire d'entité pour les commentaires
require '../models/classe/App/Manager/CommentarysManager.php';
use classe\App\Manager\CommentarysManager;
$commentarysManager = new CommentarysManager();

// Chargement de la Classe Commentarys, entité pour les commentaires
require '../models/classe/App/Entity/Commentarys.php';
use classe\App\Entity\Commentarys;
$commentarys = new Commentarys();


// Ici traitement du formulaire
$postId =  $_POST['book_id'];
if (isset($_POST['submit_commentary'])) {
    if(isset($postId)) {
        var_dump($postId);
        $postId = $commentarys->set_book_id(htmlspecialchars($postId));
        
        $name_user = $commentarys->set_name_user(htmlspecialchars($_POST['name_user']));
        $commentary = $commentarys->set_commentary(htmlspecialchars($_POST['commentary']));
        $book_id = $commentarys->set_book_id(htmlspecialchars($_POST['book_id']));

        //var_dump($name_user, $commentary, $_POST['book_id']);
        
	    if (isset($name_user) AND isset($commentary) AND isset($book_id)) {
			$postId = (int) $postId;	
            $commentarysManager->create($commentarys);
        
            header('Location: ../views/user_comments.php?id='. $_POST['book_id'] );
		
    
        } else {
        
            echo "La requête demandée n'a pas aboutie! ";
            echo '<p><a href="../views/user_comments.php"><strong>Retour</strong></a></p>';
    }

    } else {
        echo "Pas d'id passée dans l'url via le champs 'book_id'";
        echo '<p><a href="../views/user_comments.php"><strong>Retour</strong></a></p>';
    }
    
	
}

// Traitement ici des commentaires signalés avec le bouton
//$postBilletId = htmlspecialchars($_GET['id']);
//$signaled = htmlspecialchars($_GET['signaled']);
//$îd_commentary = htmlspecialchars($_GET['id_commentary']);
//
//if (isset($_GET['id'] ) AND $_GET['id'] > 0 AND !empty($_GET['id']) AND $_GET['signaled'] == 0) {
//      
//    $CommentarysManager->getPostSignaled("UPDATE commentarys SET signaled = 1 WHERE id = $îd_commentary ");
//   
//    header('Location: ../views/user_comments.php?id=' .$postBilletId );
//
//} else {
//    echo 'Commentaire non signalé !';
//} 