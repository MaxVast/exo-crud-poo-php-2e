<?php
    require 'autoload.php';

    use App\Repository\UserRepository;

    $userRepo = new UserRepository();
    $users = $userRepo->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <a href="create.php">Créer un Nouvel Utilisateur</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>E-mail</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getUsername() ?></td>
            <td><?= $user->getMail() ?></td>
            <td><?= $user->getMail() ?></td>
            <td>
                <a href="update.php?id=<?= $user->getId() ?>">Modifier</a>
                <a href="delete.php?id=<?= $user->getId() ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
