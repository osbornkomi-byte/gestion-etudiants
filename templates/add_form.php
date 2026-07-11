<?php // templates/add_form.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1>Ajouter un étudiant</h1>

    <?php if (!empty($msg)): ?>
        <div style="padding:10px;margin-bottom:15px;background:#<?= $type === 'success' ? 'dff0d8' : ($type === 'error' ? 'f2dede' : 'fcf8e3') ?>;color:#<?= $type === 'success' ? '3c763d' : ($type === 'error' ? 'a94442' : '8a6d3b') ?>;border:1px solid #<?= $type === 'success' ? 'd6e9c6' : ($type === 'error' ? 'ebccd1' : 'faebcc') ?>;border-radius:4px;">
            <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?action=add">
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
        </div>
        <div class="form-group">
            <label for="filiere">Filière (optionnelle) :</label>
            <input type="text" id="filiere" name="filiere">
        </div>
        <div class="form-actions">
            <button type="submit" class="btn"><i class="fa-solid fa-floppy-disk"></i> Enregistrer</button>
            <a href="index.php" class="btn" style="background:#95a5a6;"><i class="fa-solid fa-arrow-left"></i> Retour à la liste</a>
        </div>
    </form>
</div>
</body>
</html>