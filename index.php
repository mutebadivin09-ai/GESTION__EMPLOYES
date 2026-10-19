<?php

$employees = [
    [
        "id" => 1,
        "last_name" => "Muteba",
        "first_name" => "Divin",
        "age" => 22
    ],
    [
        "id" => 2,
        "last_name" => "Kabeya",
        "first_name" => "Jean",
        "age" => 25
    ]
];

?><!DOCTYPE html><html lang="fr"><head>
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

        <button type="button">Ajouter un employé</button>
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
                            <td><?= $employee["id"] ?></td>
                            <td><?= htmlspecialchars($employee["last_name"]) ?></td>
                            <td><?= htmlspecialchars($employee["first_name"]) ?></td>
                            <td><?= $employee["age"] ?> ans</td>

                            <td>
                                <button type="button">Modifier</button>
                                <button type="button">Supprimer</button>
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

</body></html>