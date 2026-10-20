<?php

require_once "connexion.php";

$sql = "SELECT * FROM employes ORDER BY id DESC";
$stmt = $pdo->query($sql);
$employes = $stmt->fetchAll();

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

        <?php if (empty($employes)) : ?>

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

                    <?php foreach ($employes as $employes) : ?>

                        <tr>
                            <td><?= htmlspecialchars((string) $employes["id"]) ?></td>

                            <td><?= htmlspecialchars($employes["last_name"]) ?></td>

                            <td><?= htmlspecialchars($employes["first_name"]) ?></td>

                            <td><?= htmlspecialchars((string) $employes["age"]) ?> ans</td>


                            <td>
    <a href="modifier.php?id=<?= (int) $employee["id"] ?>">Modifier</a><form action="supprimer.php" method="POST"
      onsubmit="return confirm('Voulez-vous vraiment supprimer cet employé ?');">

    <input
        type="hidden"
        name="id"
        value="<?= (int) $employee["id"] ?>"
    >

    <button type="submit">Supprimer</button>

</form>

</td>

                            
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php endif; ?>

    </section>

</main>

<footer>
    <p>Gestion des employés-2026</p>
</footer>

</body>
</html>