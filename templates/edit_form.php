<?php // templates/edit_form.php ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un étudiant</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <h1>Modifier l'étudiant #<?= htmlspecialchars($etudiant['id']) ?></h1>

    <?php if (!empty($msg)): ?>
        <div style="padding:10px;margin-bottom:15px;background:#<?= $type === 'success' ? 'dff0d8' : ($type === 'error' ? 'f2dede' : 'fcf8e3') ?>;color:#<?= $type === 'success' ? '3c763d' : ($type === 'error' ? 'a94442' : '8a6d3b') ?>;border:1px solid #<?= $type === 'success' ? 'd6e9c6' : ($type === 'error' ? 'ebccd1' : 'faebcc') ?>;border-radius:4px;">
            <?= htmlspecialchars($msg) ?>
        </div>
    <?php endif; ?>

    <form method="post" action="index.php?action=edit&id=<?= $etudiant['id'] ?>">
        <label>Nom :</label><br>
        <input type="text" name="nom" value="<?= htmlspecialchars($etudiant['nom']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>

        <label>Prénom :</label><br>
        <input type="text" name="prenom" value="<?= htmlspecialchars($etudiant['prenom']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>

        <label>Email :</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($etudiant['email']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>

        <label>Date de naissance :</label><br>
        <input type="date" name="date_naissance" value="<?= htmlspecialchars($etudiant['date_naissance']) ?>" required style="width:100%;padding:8px;margin-bottom:10px;"><br>

        <label>Filière (optionnelle) :</label><br>
        <input type="text" name="filiere" value="<?= htmlspecialchars($etudiant['filiere'] ?? '') ?>" style="width:100%;padding:8px;margin-bottom:10px;"><br>

        <button type="submit" class="btn"><i class="fa-solid fa-floppy-disk"></i> Mettre à jour</button>
        <a href="index.php" class="btn" style="background:#95a5a6;"><i class="fa-solid fa-arrow-left"></i> Retour à la liste</a>
    </form>
</div>
</body>
</html>