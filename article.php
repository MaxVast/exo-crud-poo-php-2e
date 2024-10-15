<?php
    require 'autoload.php';

    use App\Repository\ArticleRepository;

    session_start();

    if (!isset($_GET['id'])) {
        echo "Aucun article spécifié.";
        exit;
    }

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    $articleId = $_GET['id'];
    $articleRepo = new ArticleRepository();
    $article = $articleRepo->find($articleId);

    if (!$article) {
        echo "L'article n'existe pas.";
        exit;
    }
?>

    <h1><?= htmlspecialchars($article->getTitle()) ?></h1>
    <p><?= htmlspecialchars($article->getContent()) ?></p>

    <?php if ($article->getImage()): ?>
        <img src="<?= htmlspecialchars($article->getImage()) ?>" alt="Image de l'article" width="300">
    <?php endif; ?>

    <br/>

    <p><strong>Auteur :</strong> <?= htmlspecialchars($article->getAuthorName()) ?></p>

    <br>
    <a href="index.php">Retour à la liste des articles</a>
