<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="../../index.php">Retour à la liste des billet</a></p>
  
  
 <?php $commentId = isset($_POST['commentId']) ? ($_POST['commentId']) : NULL;
 $comment = isset($_POST['comment']) ? ($_POST['comment']) : NULL;
 ?>
 <h2>Editer le commentaire n°<?php $comment ?></h2>
  
<form action="index.php?action=post&id=<?= $commentId ?>" method="post">
        <p><label for="author">Auteur</label>
        <input type="text" name="author" id="author" value="<?=htmlspecialchars($comment['author']);?>">
        <label for="newComment">Nouveau commentaire</label><br />
        <textarea id="newComment" name="newComment" value = "<?=htmlspecialchars($comment['comment']);?>"></textarea>
    </div>
    <div>
        <input type="Submit" />
    </div>
</form>
<?php
$content = ob_get_clean(); ?>
  
<?php require('template.php'); ?>
