<?php

require_once "connexion.php";

$sql = "SELECT * FROM employees ORDER BY id DESC";
$stmt = $pdo->query($sql);
$employees = $stmt->fetchAll();

?><!DOCTYPE html><html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des employés</title>
    <link rel="stylesheet" href="style.css">
</head><body><header>
    <h1>Gestion des employés</h1>
    <p>Application de gestion du personnel de l'entreprise.</p>
</header>

<main>

    <section>
        <h2>Liste des employés</h2>
        <a href="ajouter.php" class="btn">Ajouter un employé</a>
    </section>

    <section>

        <?php if (empty($employees)) : ?>

            <p>Aucun employé enregistré pour le moment.</p>

        <?php else : ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Âge</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($employees as $employee) : ?>

                        <tr>
                            <td><?= htmlspecialchars((string) $employee["id"]) ?></td>

                            <td><?= htmlspecialchars($employee["last_name"]) ?></td>

                            <td><?= htmlspecialchars($employee["first_name"]) ?></td>

                            <td><?= htmlspecialchars((string) $employee["age"]) ?> ans</td>

                            <td>
                                <a href="modifier.php?id=<?= (int) $employee["id"] ?>">Modifier</a>

                                <a href="supprimer.php?id=<?= (int) $employee["id"] ?>">Supprimer</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </section>

</main>

<footer>
    <p>Gestion des employés — 2026</p>
</footer>

</body>
</html>