<?php
$bdd = new PDO('mysql:host=localhost;dbname=BDNews;charset=utf8','root', '');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $news_id = $_POST['news_id'];
    $bdd->exec("INSERT INTO commentaires SET news_id='$news_id',
                                              auteur='".mysql_escape_string($_POST['auteur'])."',
                                              texte='".mysql_escape_string($_POST['texte'])."',
                                              date=NOW()"
    );
    header("location: ".$_SERVER['SCRIPT_NAME']."?news_id=$news_id");
    exit;
} else {
    if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];}
    else $news_id = 1;
}



?>
<html>
    <head>
        <title>Les news</title>
    </head>
    <body>
    <h1>Les news</h1>
    <div id="news">
        <?php
        $news = $bdd->query("SELECT * FROM news WHERE id='$news_id'" );
        ?>
        <?php foreach ($news as $new):?>
        <h2><?php echo $new['titre'] ?> postee le <?php echo $new['date'] ?></h2>
    <p><?php echo $new['texte_nouvelle']?> </p>
        <?php endforeach ?>

        <?php
        $comments = $bdd->query("SELECT * FROM commentaires WHERE news_id='$news_id'");
        $nbre_comment = $comments->rowCount();
        ?>
    <h3><?php echo $nbre_comment ?> commentaires relatifs a cette nouvelle</h3>
        <?php foreach ($comments as $comment): ?>
            <h3><?php echo $comment['auteur'] ?> a ecrit le <?php echo $comment['date'] ?></h3>
            <p><?php echo $comment['texte'] ?></p>
        <?php endforeach ?>
    <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" name="ajoutcomment">
        <input type="hidden" name="news_id" value="<?php echo $news_id?>">
        <input type="text" name="auteur" value="Votre nom"><br />
        <textarea name="texte" rows="5" cols="10">Saisissez votre commentaire</textarea><br />
        <input type="submit" name="submit" value="Envoyer">
    </form>
    </div>
    </body>
</html>