<?php
    session_start();
    require 'autoload.php';

    use App\Repository\UserRepository;
    use App\Entity\User;

    $userRepo = new UserRepository();

    if (isset($_GET['id'])) {
        $user = $userRepo->read($_GET['id']);

        if (!($user instanceof User)) {
            header('Location: index.php');
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'Utilisateur</title>
</head>
<body>
    <h1>Détails de l'Utilisateur</h1>
    
    <p><strong>Nom d'utilisateur:</strong> <?= htmlspecialchars($user->getUsername()) ?></p>
    <p><strong>E-mail:</strong> <?= htmlspecialchars($user->getMail()) ?></p>
    <p><strong>Photo de Profil:</strong></p>
    <?php if (!empty($user->getMediaObject())): ?>
        <img src="<?= htmlspecialchars($user->getMediaObject()) ?>" width="100" height="100" alt="Photo de profil">
    <?php else: ?>
        <p>Aucune photo disponible.</p>
    <?php endif; ?>

    <br>
    <a href="update.php?id=<?= $user->getId() ?>">Modifier cet Utilisateur</a>
    <br>
    <a href="delete.php?id=<?= $user->getId() ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer cet Utilisateur</a>
    <br>
    <a href="index.php">Retour à la liste des utilisateurs</a>
</body>
</html>
