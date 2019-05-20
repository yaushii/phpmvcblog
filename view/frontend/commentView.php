<?php $title = 'Mon blog'; ?>
<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>
 
 
<h2>Editer le commentaire</h2>
 
<form action="index.php?action=edit&;id=<?= $commentID ?>" method="post">
        <label for="newComment">Nouveau commentaire</label><br />
        <textarea id="newComment" name="newComment" value = ""></textarea>
    </div>
    <div>
        <input type="Submit" />
    </div>
</form>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php
$content = ob_get_clean(); ?>
 
<?php require('template.php'); ?>