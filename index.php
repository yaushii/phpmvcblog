<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            elseif($_GET['action'] == 'edit'){
                if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postID']) && $_GET['postID'] > 0){
                  //if (isset($_POST['newComment'])) {
                    edit($_POST['newComment'], $_GET['id'], $_GET['postID']); //ligne 37
                  //}
                  //else {
                  //  throw new Exception ('Bug');
                  //}
                }
              }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
        }
        else {
            listPosts();
        }

}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
