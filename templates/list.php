<?php // templates/list.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Étudiants</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1>Gestion des Étudiants</h1>

    <?php if (!empty($msg)): ?>
        <div style="padding:10px;margin-bottom:15px;background:#<?= $type === 'success' ? 'dff0d8' : ($type === 'error' ? 'f2dede' : 'fcf8e3') ?>;color:#<?= $type === 'success' ? '3c763d' : ($type === 'error' ? 'a94442' : '8a6d3b') ?>;border:1px solid #<?= $type === 'success' ? 'd6e9c6' : ($type === 'error' ? 'ebccd1' : 'faebcc') ?>;border-radius:4px;">
            <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>

    <div style="margin-bottom:15px;">
        <a href="index.php?action=add_form" class="btn"><i class="fa-solid fa-plus"></i> Ajouter un étudiant</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date de naissance</th>
                <th>Filière</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($etudiants)): ?>
                <tr><td colspan="7" style="text-align:center;">Aucun étudiant trouvé.</td></tr>
            <?php else: ?>
                <?php foreach ($etudiants as $et): ?>
                    <tr>
                        <td><?= htmlspecialchars($et['id']) ?></td>
                        <td><?= htmlspecialchars($et['nom']) ?></td>
                        <td><?= htmlspecialchars($et['prenom']) ?></td>
                        <td><?= htmlspecialchars($et['email']) ?></td>
                        <td><?= htmlspecialchars($et['date_naissance']) ?></td>
                        <td><?= htmlspecialchars($et['filiere'] ?? '') ?></td>
                        <td class="action-links">
                            <a href="index.php?action=edit_form&id=<?= $et['id'] ?>" class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                            <a href="index.php?action=delete&id=<?= $et['id'] ?>" class="btn btn-delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?');"><i class="fa-solid fa-trash-can"></i> Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
