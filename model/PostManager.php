<?php
namespace OpenClassrooms\Blog\Model;

 
 
require_once("model/Manager.php");
 
class PostManager extends Manager
{
// recuperer les 5 derniers billets dans la bdd
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
 
        return $req;
    }
 // recupere le billet que l'on a choisie de commenté.
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
 
        return $post;
    }
}