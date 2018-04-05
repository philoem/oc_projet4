<?php
namespace Forteroche;
use \PDO;
/**
 * class CommentarySignaled  
 * Gère l'affichage des billets dans la page admin.php et user.php
 */

class CommentarySignaled {

      /**
     * Assesseur pour enregistrer un commentaire signalé
     * @return le champs "signaled" et "book_id" de la table
     */
    public function setPostSignaled() {
    
        $db = $this->dbConnect();
        $req = $db->exec("UPDATE commentarys SET signaled = 1 WHERE signaled = 0 ");
        
        return $req;
    }
    
    private function dbConnect() {
    
        $db = new PDO('mysql:host=localhost;dbname=projet_4;charset=utf8', 'root', '');
        return $db;
    }


}