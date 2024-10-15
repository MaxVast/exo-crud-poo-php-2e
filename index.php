<?php
    require 'autoload.php';
    
    use App\Repository\ArticleRepository;

    session_start();
    
    $articleRepo = new ArticleRepository();
    $articles = $articleRepo->findAll();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }

    // Si l'utilisateur est connecté, on récupère son nom
    $userName = $_SESSION['username'];
?>
    <p> Welcome <?php echo $userName ?>
    <br/>
    <a href="logout.php">Deconnexion</a>
    <br/>
    <h1>Liste des articles</h1>
    <br/>
    <a href="create_article.php">Créer un article</a>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <h2><?= htmlspecialchars($article->getTitle()) ?></h2>
                <?php if ($article->getImage()): ?>
                    <img src="<?= htmlspecialchars($article->getImage()) ?>" alt="Image de l'article" width="200">
                <?php endif; ?>
                <br/>
                <a href="article.php?id=<?= $article->getId() ?>">Lire l'article</
            </li>
        <?php endforeach; ?>
    </ul>
    